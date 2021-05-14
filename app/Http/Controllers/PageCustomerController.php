<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class PageCustomerController extends Controller
{
    
    public function form_register(){


        return view('pages.auth.form_register');
    }

    public function login_page(){
        $categoy_products = CategoryProduct::get();

        return view('pages.auth.login', compact('categoy_products'));
    }

    public function login_post(Request $request){

        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;

        $result = Customer::where('customer_email', $customer_email)->where('customer_password', $customer_password)->first();

        if($result){
            Session::put('customer_id', $result->id);
            Session::put('name', $result->customer_name);
            return Redirect::to('/');
        } else{
            return Redirect::back()->with('message', 'Tài khoản hoặc mật khẩu bạn nhập không đúng');

        }

    }

    public function register_page(){
        $categoy_products = CategoryProduct::get();

        return view('pages.auth.register', compact('categoy_products'));
    }

    public function register_post(Request $request){

        // $customers = Customer::create([
        //     'customer_name' => $request->customer_name,
        //     'customer_email' => $request->customer_email,
        //     'customer_password' => $request->customer_password
        // ]);

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;

        $insert_customer = Customer::create($data);
      

        Session::put('customer_id', $insert_customer->id);
        Session::put('customer_name', $request->customer_name);

        return Redirect::to('/');
    }

    public function logout(){

        Session::flush();
        return Redirect::to('/login');
    }
}
