<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rating;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Cart; // su dung thu vien Cart (bumbummen99)
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class PageOrderController extends Controller
{
    
    public function add_to_cart(Request $request){
        
        if(Session::get('customer_id')){
            // dd($request->all());
            $productId = $request->product_id_hidden;
            $quantity = $request->qty;
            $productInfo = Product::where('id', $productId)->get();
            $isProductInfor = null;
            foreach($productInfo as $productInforItem){

                $isProductInfor = $productInforItem;
            }

            $data['id'] = $isProductInfor->id;
            $data['qty'] = $quantity;
            $data['name'] = $isProductInfor->productname;
            $data['price'] = $isProductInfor->price;
            $data['weight'] = '123';
            $data['options']['image'] = $isProductInfor->product_image;
            Cart::add($data);

            return Redirect::to('show-cart');
        } else{
            return Redirect::to('login');
        }
     
    }

    public function show_cart(){
        $categoy_products = CategoryProduct::get();

        return view('pages.cart.show_cart', compact('categoy_products'));
    }

    public function update_cart_qty(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_qty;
        Cart::update($rowId, $qty);

        return Redirect::to('show-cart');
    }

    public function delete_cart($rowId){
        Cart::update($rowId, 0); //xóa 1 cart theo id
        // Cart::destroy(); //dùng để xóa hết cart
        return redirect()->back()->with('message','Xóa hết giỏ thành công');

    }

    public function order(Request $request){

        $content = Cart::content();
        foreach($content as $contentItem){
            $order_data = array();
            $order_data['product_id'] = $contentItem->id;
            $order_data['customer_id'] = Session::get('customer_id');

            $orders = Order::create($order_data);
        }

        foreach($content as $itemOrderDetail){
            $order_detail_data = array();
            $order_detail_data['customer_id'] = Session::get('customer_id');
            $order_detail_data['product_id'] = $itemOrderDetail->id;
            $order_detail_data['product_name'] = $itemOrderDetail->name;
            $order_detail_data['product_price'] = $itemOrderDetail->price;
            $order_detail_data['product_quantity'] = $itemOrderDetail->qty;
            $order_detail_data['product_rating'] = 5;

            $orderDetails = OrderDetail::create($order_detail_data);
        }

        Cart::destroy();
        return Redirect::to('/');
    }

    public function insert_rating(Request $request){
        $data = $request->all();

        $get_rating = Rating::where('customer_id', $data['customer_id'])->where('product_id', $data['product_id'])->first();
        if($get_rating){
            Rating::find($get_rating->id)->update([
                'customer_id' => $data['customer_id'],
                'product_id' => $data['product_id'],
                'product_name' => $data['product_name'],
                'rating' => $data['index'],
            ]);
        } else{
            Rating::create([
                'customer_id' => $data['customer_id'],
                'product_id' => $data['product_id'],
                'product_name' => $data['product_name'],
                'rating' => $data['index'],
            ]);
        }
   

        echo 'done';
    }

}
