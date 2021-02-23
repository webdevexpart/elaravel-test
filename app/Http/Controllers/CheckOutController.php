<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use DB;
use Cart;
use Session;
session_start();

class CheckOutController extends Controller
{
    public function login_check(){
        return view('pages.login');
    }

    public function customer_registration(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_mobile'] = $request->customer_mobile;
        
         $customer_id = DB::table('tbl_customer')
                          ->insertGetId($data);
                    Session::put('customer_id', $customer_id);
                    Session::put('customer_name', $request->customer_name);

                return Redirect('/checkout');
    }


    public function checkout(){
        return view('pages.checkout');
    }


    public function shipping_details(Request $request){
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_first_name'] = $request->shipping_first_name;
        $data['shipping_last_name'] = $request->shipping_last_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_mobile'] = $request->shipping_mobile;
        $data['shipping_city'] = $request->shipping_city;

        $shipping_id = DB::table('tbl_shipping')
                        ->insertGetId($data);
            Session::put('shipping_id', $shipping_id);
            return Redirect::to('/payment');
    }

    public function customer_login(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = md5($request->customer_password);

        $result = DB::table('tbl_customer')
                ->where('customer_email', $customer_email)
                ->where('customer_password', $customer_password)
                ->first();

                if($result){
                    Session::put('customer_id', $result->customer_id);
                    return Redirect::to('/');
                }else{
                    return Redirect::to('/login-check');
                }
    }


    public function payment(){
        return view('pages.payment');
    }

    public function order_place(Request $request){
        $payment_method = $request->payment_method;



        $pdata = array();
        $pdata['payment_method'] = $payment_method;
        $pdata['payment_status'] = 0;
        $payment_id = DB::table('tbl_payment')
                ->insertGetId($pdata);

        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shipping_id'] = Session::get('shipping_id');
        $odata['payment_id'] = $payment_id;
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 0;

        $order_id = DB::table('tbl_order')
                ->insertGetId($odata);


        $content = Cart::content();
        $oddata = array();

        foreach($content as $v_content){
            $oddata['order_id'] = $order_id;
            $oddata['customer_id'] = Session::get('customer_id');
            $oddata['shipping_id'] = Session::get('shipping_id');
            $oddata['payment_id'] = $payment_id; 
            $oddata['product_id'] = $v_content->id;
            $oddata['product_name'] = $v_content->name;
            $oddata['product_price'] = $v_content->price;
            $oddata['product_sales_quantity'] = $v_content->qty;

            DB::table('tbl_order_details')
                    ->insert($oddata);
        }

        if($payment_method == 'Hand Cash'){
            Cart::destroy();
            return view('pages.hand_cash');
        }elseif($payment_method == 'Card'){
            echo "Card";
        }elseif($payment_method == 'Bkash'){
            echo "Bkash";
        }else{
            echo "Not Selected";
        }
      
    }


    public function customer_logout(){
        Session::flush();
        return Redirect::to('/');
    }


    public function manage_order(){
        $all_order_info = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
                    ->select('tbl_order.*', 'tbl_customer.customer_name')
                    ->get();
        
                    $manage_order = view('admin.manage_order')
                                ->with('all_order_info', $all_order_info);
                    return view('admin_layout')
                            ->with('admin.manage_order', $manage_order );
    }


    public function view_order_details($order_id){
        $order_by_id = DB::table('tbl_order_details')
                    ->join('tbl_customer', 'tbl_order_details.customer_id', '=', 'tbl_customer.customer_id')
                    ->join('tbl_shipping', 'tbl_order_details.shipping_id', '=', 'tbl_shipping.shipping_id')
                    ->join('tbl_order', 'tbl_order_details.order_id', '=', 'tbl_order.order_id')
                    ->select('tbl_order.*', 'tbl_order_details.*', 'tbl_customer.*', 'tbl_shipping.*')
                    ->first();
        
                    // $view_order = view('admin.view_order')
                    //             ->with('all_order_info', $all_order_info);
                    // return view('admin_layout')
                    //         ->with('admin.view_order', $view_order);

                    echo "<pre>";
                    print_r($order_by_id);
                    echo "</pre>";
    }

    
}
