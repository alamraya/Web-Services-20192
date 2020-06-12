<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

use App\Model\Book as Book;
use App\Model\BookCategory;
use Validator;
class BookController extends BaseController
{
    public function getBook(Request $request)
    {
        $input = $request->all();
        $limit = isset($input['limit']) ? $input['limit'] : 10;
        $search = isset($input['keyword']) ? $input['keyword'] : "";
        $order_by = isset($input['order_by']) ? $input['order_by'] : "";
        $order = isset($input['order']) ? $input['order'] : "ASC";
        $categorySlug = isset($request->slug) ? $request->slug : "";
        $book = Book::select("id","title","slug","description","author","publisher","cover","price","views","stock")
        ->with(["categories"=>function ($query)
        {
            return $query->select("name","slug");
        }])
        ->where("status","PUBLISH")
        ->where(function($query) use ($search,$order_by,$order)
        {
            if(!empty($search)){
                $query->where("title","like","%$search%");
            }

            if(!empty($order_by)){
                $query->orderBy($order_by,$order);
            }
            return $query;
        });
        if(!empty($categorySlug)){
            $book = $book->whereHas("categories",function($query) use ($categorySlug){
                $query->where("categories.slug",$categorySlug);
                return $query;
            });
        }
        
        $result = $book->paginate($limit);
        return $this->sendResponse($result,"success retrive book data");
    }

    public  function singleBook(Request $request)
    {
        $slug = $request->slug;
        $book = Book::select("id","title","slug","description","author","publisher","cover","price","views","stock")->with("categories")->where("slug",$slug)->first();
        if(!$book){
            return $this->sendError("Not Found");
        }
        return $this->sendResponse($book,"success retrive book data");
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "title" => "required",
            "description" => "required",
            "author" => "required",
            "publisher" => "required",
            "price" => "required",
            "stock" => "required",
            "status" => "required",
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $input['title'] = strip_tags($input['title']);
            $input['slug'] = strlen($input['title']) > 40 ? str_replace(" ","-",substr($input['title'],0,40))."-".date("his") : str_replace(" ","-",$input['title'])."-".date("his");
            $input['create_by'] = auth()->user()->id;
            $book = Book::where("slug",$input['slug'])->first();

            $book = Book::create($input);
            
            if(!$book){
                return $this->sendError("something went wrong");
            }
            return $this->sendResponse($book,"Book has been added");
        } catch (\Exception $e) {
            return $this->sendError("somthinge went wrong",$e->getMessage());
        }
    }

    public function update(Request $request, $bookId)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "title" => "required",
            "description" => "required",
            "author" => "required",
            "publisher" => "required",
            "price" => "required",
            "stock" => "required",
            "status" => "required",
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['title'] = strip_tags($input['title']);
        $input['slug'] = strlen($input['title']) > 40 ? str_replace(" ","-",substr($input->title,0,40)) : str_replace(" ","-",$input['title']);
        $book = Book::find($bookId);        
        
        if(!$book){
            return $this->sendError("Buku tidak ditemukan");
        }

        foreach ($input as $key => $value) {
            $book->{$key} = $value;
        }

        $book->save();

        return $this->sendResponse($book,"Book has been added");
    }

    public function delete($bookId)
    {
        $book = Book::find($bookId);
        if(!$book){
            return $this->sendError("Not found");
        }
        $book->status = "DELETED";
        $book->deleted_by = auth()->user()->id;
        $book->deleted_at = date("Y-m-d H:i:s");
        $book->save();
        return $this->sendResponse([],"Book has been deleted");
    }

    public function changeCategory(Request $request, $bookId)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "category" => "required",
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $book = Book::find($bookId);
        $category = explode(",",$input['category']);
        
        $book->categories()->sync($category);
        return $this->sendResponse([],"Category has been saved");
    }
}