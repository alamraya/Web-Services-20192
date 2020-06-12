<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

use App\Model\Category;

class CategoryController extends BaseController
{
    public function getCategory(Request $request)
    {
        $input = $request->all();
        $limit = isset($input['limit']) ? $input['limit'] : 10;
        $search = isset($input['keyword']) ? $input['keyword'] : "";
        $order_by = isset($input['order_by']) ? $input['order_by'] : "";
        $order = isset($input['order']) ? $input['order'] : "ASC";
        $category = Category::select("id","name","slug","image")
        ->where(function($query) use ($search,$order_by,$order)
        {
            if(!empty($search)){
                $query->where("name","like","%$search%");
            }

            if(!empty($order_by)){
                $query->orderBy($order_by,$order);
            }
            return $query;
        });
        
        $result = $category->paginate($limit);
        return $this->sendResponse($result,"success retrive category data");
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "name" => "required"
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $input['name'] = strip_tags($input['name']);
            $input['slug'] = str_replace(" ","-",$input['name']);
            $input['image'] = "-";
            
            // Check slug was exist
            $category = Category::where("slug",$input['slug'])->first();
            if($category){
                throw new \Exception("Kategori sudah ada.", 1);
            }

            $category = Category::create($input);
            return $this->sendResponse($category,"Kategori berhasil ditambahkan");
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function update(Request $request,$categoryId)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "name" => "required"
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $input['name'] = strip_tags($input['name']);
            $input['slug'] = str_replace(" ","-",$input['name']);
            
            // Check slug was exist
            $category = Category::where("slug",$input['slug'])->whereNotIn("id",[$categoryId])->first();
            if($category){
                throw new \Exception("Kategori sudah ada.", 1);
            }

            $category = Category::find($categoryId);
            
            foreach ($input as $key => $value) {
                $category->{$key} = $value;
            }
            $category->save();

            return $this->sendResponse($category,"Kategori berhasil diupdate");
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}