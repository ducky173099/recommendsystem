<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Rating;
use App\Models\CategoryProduct;
use App\Models\Customer;
use App\ProductSimilarity;
use Illuminate\Http\Request;
use App\Components\recommend;
use Session;
session_start();

class PageProductController extends Controller
{

    private $recommend;
    // private $productsimilar;

    // public function __construct(Recommend $recommend, ProductSimilarity $productsimilar){

    //     $this->recommend = $recommend;
    //     $this->productsimilar = $productsimilar;
    // }
    
    public function __construct(Recommend $recommend){

        $this->recommend = $recommend;
    }

    
    public function product_detail($product_slug){

        $product_detail = Product::where('product_slug',$product_slug)->first();
        
        $categoy_products = CategoryProduct::get();
        $get_all_product = Product::get();

        $ratings = Rating::where('product_id', $product_detail->id)->avg('rating'); //avg sẽ tính trung bình cộng của rating
        $ratings = round($ratings); // round để làm tròn, ví dụ 2.800 -> 3

        // dd(json_decode($get_all_product));
        $productSimilarity = new ProductSimilarity(json_decode($get_all_product));
        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
        $products          = $productSimilarity->getProductsSortedBySimularity($product_detail->id, $similarityMatrix);


        $all_rating = Rating::get();

        // $names = Rating::join('customers', 'ratings.customer_id', '=', 'customers.customer_id')->select('customers.customer_name')->get();
        // $product_name = Rating::join('products', 'ratings.product_id', '=', 'products.id')->select('products.productname')->get();
        // $rating = Rating::get('rating');

        // $get_rating = Rating::get();
        $matrix = [];
        $get_name = '';

        $get_rating = Rating::with('customer')->orderBy('id', 'DESC')->get();
        // dd($id_cus);


        foreach($get_rating as $key => $item){
            $customer_id = $item->customer_id;
            $get_name = $item->customer->customer_name;

            $child_id = $item->id;
            $rating = $item->rating;
            // $matrix[$get_name][$item->product_name] = $rating;
            $matrix[$customer_id][$item->product_id] = $rating;
        }

        // dd($matrix);
        $get_name_customer = Customer::where('id', Session::get('customer_id'))->get();
        
        // dd($get_name_customer);
        $name_is_login = '';
        foreach($get_name_customer as $key => $itemNameCustomer){
            $name_is_login = $itemNameCustomer->customer_name;
        }


        $recommendation = array();
        // $recommendation = $this->recommend->getRecommendation($matrix, $name_is_login);
        $recommendation = $this->recommend->getRecommendation($matrix, Session::get('customer_id'));
        // var_dump($recommendation);
        // dd($recommendation);

        $incre_product_view = Product::where('id', $product_detail->id)->first();
        $incre_product_view->product_view = $incre_product_view->product_view + 1;
        $incre_product_view->save();

 

        // dd($products);

        return view('pages.product.product_detail', compact('product_detail', 'categoy_products', 'ratings', 'recommendation', 'get_all_product', 'products'));
    }

    
   
}
