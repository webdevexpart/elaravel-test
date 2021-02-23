<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http\Requests;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Str;
use DB;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
        return view('admin.add_product');
    }

    public function all_product(){
        $all_product_info = DB::table('tbl_products')
                            ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                            ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
                            ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                            ->get();
        $manage_product = view('admin.all_product')
                    ->with('all_product_info', $all_product_info);
        return view('admin_layout')
                    ->with('admin.all_product', $manage_product);
    }

    public function save_product(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;


        $image = $request->file('product_image');
        if($image){
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image'] = $image_url;
                DB::table('tbl_products')->insert($data);
                Session::put('message', 'Product added successfully!');
                return Redirect::to('/add-product');
            }
        }
        $data['product_image'] = '';
            DB::table('tbl_products')->insert($data);
            Session::put('message', 'Product added successfully! without Image.');
            return Redirect::to('/add-product');
    }

    public function delete_product($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();
        Session::put('message', 'Product delete successfully!');
            return Redirect::to('/all-product');
    }


    public function inactive_product($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
            Session::put('message', 'Product inactive successfully!');
                return Redirect::to('/all-product');
    }
    public function active_product($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
            Session::put('message', 'Product active successfully!');
                return Redirect::to('/all-product');
    }
}
