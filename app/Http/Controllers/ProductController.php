<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function addProduct(Request $req){
        $Product=new Product;
        $Product->name=$req->input('name');
        $Product->price=$req->input('price');
        $Product->description=$req->input('description');
        $Product->file_path=$req->file('file')->store('products');
        $Product->save();
        return $req->input();
    }
    function list(){
        return Product::all();
    }
    function delete($id){
        $result=Product::where('id',$id)->delete();
        if($result){
            return ["result" => "Product has been deleted"];
        }else{
            return ["result"=> "Operation Failed"];
        }
    }
    function getProduct($id){
       return Product::find($id);
    }
    function updateproduct($id, Request $req){
        // return $req->input();
        $Product= Product::find($id);
        $Product->name=$req->input('name');
        $Product->price=$req->input('price');
        $Product->description=$req->input('description');
        if($req->file('file')){
            $Product->file_path=$req->file('file')->store('products');
        }
      
        $Product->save();
        return $req->input();
    }
    function search($key){
        return Product::where('name','like',"%$key%")->get();
    }
}
