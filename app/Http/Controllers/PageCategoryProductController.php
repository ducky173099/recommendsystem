<?php

namespace App\Http\Controllers;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Components\recommend;
use Session;
session_start();

class PageCategoryProductController extends Controller
{
    //
    // public function index(){
    //     //categoy_products là tên biến tự đặt
    //     //gọi đến bảng CategoryProduct rồi sau đó lấy hết dữ liệu ra
    //     $categoy_products = CategoryProduct::get();
    //     $products = Product::get();
    //     // dd($products);
    //     return view('pages.home.home', compact('categoy_products', 'products'));

    // }
    private $recommend;

    public function __construct(Recommend $recommend){

        $this->recommend = $recommend;
    }


    public function product_by_category($slug){
        $categoy_products = CategoryProduct::get();

        $get_id_category_by_slug = CategoryProduct::where('slug', $slug)->get();
        foreach($get_id_category_by_slug as $key => $item){
            $category_id = $item->id;
        }

        $products = Product::where('category_id', $category_id)->paginate(8);
// dd($products);
        $matrix = [];
        $get_name = '';

        $get_rating = Rating::with('customer')->orderBy('id', 'DESC')->get();

        foreach($get_rating as $key => $item){
            $customer_id = $item->customer_id;
            $get_name = $item->customer->customer_name;

            $child_id = $item->id;
            $rating = $item->rating;
            $matrix[$customer_id][$item->product_id] = $rating;
        }
        
        $recommendation = array();
        $recommendation = $this->recommend->getRecommendation($matrix, Session::get('customer_id'));

        return view('pages.product.product_by_category', compact('categoy_products', 'products', 'recommendation'));
    }




}
