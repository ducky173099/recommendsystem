<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rating;
use App\Components\recommend;
use Session;
session_start();



class PageHomeController extends Controller
{

    private $recommend;

    public function __construct(Recommend $recommend){

        $this->recommend = $recommend;
    }

  

    public function index(){
        //categoy_products là tên biến tự đặt
        //gọi đến bảng CategoryProduct rồi sau đó lấy hết dữ liệu ra
        $categoy_products = CategoryProduct::get();
        $products = Product::get();
        $get_product_new = Product::orderBy('created_at', 'DESC')->take(8)->get();
        $product_top_view = Product::orderBy('product_view', 'DESC')->take(6)->get();


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

        
        $recommendation = array();
        // $recommendation = $this->recommend->getRecommendation($matrix, $name_is_login);
        $recommendation = $this->recommend->getRecommendation($matrix, Session::get('customer_id'));
        // var_dump($recommendation);

        // dd($get_product_new);


        return view('pages.home.home', compact(
            'categoy_products', 
            'products', 
            'get_product_new',
            'product_top_view',
            'recommendation'
        ));

    }

    public function shop(){
        $categoy_products = CategoryProduct::get();
        $products = Product::orderBy('id', 'DESC')->paginate(8);

        foreach($products as $key => $item){
            $get_id_product = $item->id;
            $ratings = Rating::where('product_id', $get_id_product)->avg('rating'); //avg sẽ tính trung bình cộng của rating
            $ratings = round($ratings); // round để làm tròn, ví dụ 2.800 -> 3
        }


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

        
        $recommendation = array();
        // $recommendation = $this->recommend->getRecommendation($matrix, $name_is_login);
        $recommendation = $this->recommend->getRecommendation($matrix, Session::get('customer_id'));

        // var_dump($get_id_product);
        // dd($products);

        return view('pages.shop.shop', compact('categoy_products', 'products', 'ratings','recommendation'));
    }
    
    public function search(Request $request){
        $categoy_products = CategoryProduct::get();

        $keywords = $request->keyword;
        $search_product = Product::where('productname', 'like', '%' .$keywords.'%')->get();

        return view('pages.components.search', compact('categoy_products', 'search_product'));
    }

    public function search_auto_complete(Request $request){
        $data = $request->all();

        if($data['query']){
            $products = Product::where('productname', 'like', '%' .$data['query'].'%')->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                foreach($products as $key => $itemSearch){
                    $output .='<li class="li_search"><a href="#">'.$itemSearch->productname.'</a></li>';
                }

            $output .='</ul>';

            echo $output;
        }
    }
}
