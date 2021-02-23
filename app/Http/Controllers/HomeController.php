<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class HomeController extends Controller
{
    public function index(){

        $all_published_product = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
        ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
        ->where('tbl_products.publication_status', 1)
        ->orderby('tbl_products.product_id', 'desc')
        ->limit(9)
        ->get();
        $manage_published_product = view('pages.home_content')
        ->with('all_published_product', $all_published_product);
        return view('layout')
        ->with('pages.home_content', $manage_published_product);
        //return view('pages.home_content'); // show front page
    }


    public function show_product_by_category($category_id){

        $product_by_category = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
        ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
        ->where('tbl_products.publication_status', 1)
        ->where('tbl_category.category_id', $category_id)
        ->orderby('tbl_products.product_id', 'desc')
        ->limit(18)
        ->get();
        $manage_product_by_category = view('pages.show_product_by_category')
        ->with('product_by_category', $product_by_category);
        return view('layout')
        ->with('pages.show_product_by_category', $manage_product_by_category);
    }

    public function show_product_by_manufacture($manufacture_id){
        $product_by_manufacture = DB::table('tbl_products')
        ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
        ->select('tbl_products.*', 'tbl_manufacture.manufacture_name')
        ->where('tbl_manufacture.manufacture_id', $manufacture_id)
        ->where('tbl_products.publication_status', 1)
        ->orderby('tbl_products.product_id', 'desc')
        ->limit(18)
        ->get();
        $manage_product_by_manufacture = view('pages.show_product_by_manufacture')
        ->with('product_by_manufacture', $product_by_manufacture);
        return view('layout')
        ->with('pages.show_product_by_manufacture', $manage_product_by_manufacture);
    }



    public function show_product_by_id ($product_id){
        $show_product = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
        ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
        ->where('tbl_products.publication_status', 1)
        ->where('tbl_products.product_id', $product_id)
        ->first();
        $manage_show_product = view('pages.product_details')
        ->with('show_product', $show_product);
        return view('layout')
        ->with('pages.product_details', $manage_show_product);
    }

}
