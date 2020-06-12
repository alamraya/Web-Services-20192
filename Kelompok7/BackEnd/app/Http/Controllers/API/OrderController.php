<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use DB;
use Illuminate\Support\Facades\Http;

use App\Model\Order;
use App\Model\Book;
use App\Model\BookOrder;
use App\Model\ShippingAddress;
use App\Helper\StatusOrder;

class OrderController extends BaseController
{
    public function order(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "books" => "required",
            "ongkir" => "required",
            "courier" => "required"
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        // start order book
        try {
            //make book id to array
            $bookArr = $input['books'];
            // using transaction
            DB::beginTransaction();

            // Get shiping address
            $address = ShippingAddress::where("user_id", auth()->user()->id)->where("is_primary",1)->first();
            if(!$address){
                throw new \Exception("Alamat Pengiriman tidak boleh kosong", 1);
                
            }
            
            // new order
            $order = new Order();
            $order->invoice_number = $this->generateInvoiceNumber();
            $order->user_id = auth()->user()->id;
            $order->postal_fee = $input["ongkir"];
            $order->courier = $input["courier"];
            $order->shipping_address_id = $address->id;
            // Status 1 = waiting payment
            $order->status = 1;
            $order->save();

            // insert to detail book order
            $totalprice = 0;
            foreach($bookArr as $item){
                // check the book is exist
                $book = Book::select("id","price","stock", "title")->where("id",$item['id'])->first();
                
                if(!$book){
                    throw new \Exception("Book Not Found", 1);
                }

                if(!($book->stock >= $item['quantity'])){
                    throw new \Exception("Stok $book->title tidak cukup", 1);
                }
                // add book to detail order
                $order->books()->attach($book->id,["price"=>$book->price,"quantity"=> $item['quantity']]);
                $totalprice += $item['quantity'] * $book->price;
            }
            
            // Updating total price in order
            $order->total_price = $totalprice;
            $order->save();

            DB::commit();

            // $result = Order::with("books");
            return $this->sendResponse($order, "Success");
        } catch (\Exception $e) {
            $error['error'] = $e->getMessage();
            DB::rollBack();
            return $this->sendError("Something went wrong!",$error);
        }
    }

    private function generateInvoiceNumber()
    {
        $userId = auth()->user()->id;
        $dateTime = date("YmdHis");
        return "$userId/$dateTime";
    }

    public function detail($orderId)
    {
        $order = Order::with(["books"=>function ($query)
        {
            return $query->select("title","book_order.price","book_order.quantity","order_id","book_id","author","cover");
        }])->with("shipping_address");

        if(auth()->user()->roles != 99){
            $order = $order->where("user_id",auth()->user()->id);
        }
        $order = $order->find($orderId);
        
        if(!$order){
            return $this->sendError("Order Not Found");
        }
        $order->statusOrder = StatusOrder::check($order->status);
        return $this->sendResponse($order,"retrive order data success");
    }

    public function updateResi(Request $request, $orderId)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "resi" => "required",
            "courier" => "required"
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $order = Order::find($orderId);
        
        if(!$order){
            return $this->sendError("Order Not Found");
        }

        $order->awb = $input['resi'];
        $order->courier = $input['courier'];
        // Reference to status Order
        $order->status = 4;
        $order->save();

        return $this->sendResponse([],"update resi success");
    }

    public function trackOrder($orderId)
    {
        $order = Order::find($orderId);
        
        if(!$order){
            return $this->sendError("Order Not Found");
        }

        if($order->status == 4){
            $output["status"] = StatusOrder::check($order->status);
            $output['result'] = StatusOrder::track($order->awb,$order->courier);
            return $this->sendResponse($output,"success");
        }else{
            $output["status"] = StatusOrder::check($order->status);
            return $this->sendResponse($output,"success");
        }
    }

    public function getListOrder(Request $request)
    {
        $input = $request->all();
        $limit = isset($input['limit']) ? $input['limit'] : 10;
        $dateStart = isset($input['date_start']) ? $input['date_start'] : "";
        $dateEnd = isset($input['date_end']) ? $input['date_end'] : "";
        $order_by = isset($input['order_by']) ? $input['order_by'] : "";
        $order = isset($input['order']) ? $input['order'] : "ASC";

        $orders = Order::select('*');
        if(!empty($dateStart)){
            if(!empty($dateEnd)){
                $orders = $orders->whereBetween("created_at",[$dateStart,$dateEnd]);
            }else{
                $orders = $orders->where("created_at","like","%$dateStart%");
            }
        }

        if(!empty($order_by)){
            $orders = $orders->orderBy($order_by,$order);
        }

        if(auth()->user()->roles != 99){
            $orders = $orders->where("user_id",auth()->user()->id);
        }
        $result = $orders->paginate($limit);
        return $this->sendResponse($result,"success retrive order data");
    }

    public function cancelOrder($orderId)
    {
        $this->updateStatus($orderId,6);
        return $this->sendResponse([],"Pesanan berhasil dibatalkan.");
    }

    public function updateStatus($orderId,$status)
    {
        $order = Order::find($orderId);

        if(($order->status < 4) && ($status == 6)){
            $this->returnStock($orderId);
        }
        $order->status = $status;
        $order->save();
        return $this->sendResponse([],"update status berhasil");
    }

    private function returnStock($orderId)
    {
        try {
            $orders = BookOrder::where("order_id",$orderId)->get();
            DB::beginTransaction();
            foreach($orders as $order){
                $book = Book::find($order->book_id);
                if(!$book){
                    throw new \Exception("Tidak dapat menemukan buku", 1);
                }
                $book->stock = $book->stock + $order->quantity;
                $book->update();
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError($e->getMessage(),"error");
        }
    }

    public function deleteOrder($orderId)
    {
        try {
            $order = Order::find($orderId);
            if(!$order){
                throw new \Exception("Order Tidak ditemukan", 1);
                
            }
            if($order->status < 4){
                $this->returnStock($orderId);
            }
            $order->delete();
            $orders = BookOrder::where("order_id",$orderId)->delete();
            return $this->sendResponse([],"Pesanan berhasil dihapus");
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),"error");
        }
    }

}