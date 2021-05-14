<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Feature;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Str;

// use App\Traits\StorageImageTrait;
class AdminProductController extends Controller
{
    // use StorageImageTrait;

    public function product_show(){
        $products = Product::latest()->paginate(10);

        // dd($products);

        return view('admin.product.product_show', compact('products'));
    }

    public function create(){

        $cate = CategoryProduct::get();
        $features = Feature::get();

        return view('admin.product.product_add', compact('cate', 'features'));
    }

    public function store(Request $request){
        // $dataProductCreate = [
        //     'productname' => $request->productname,
        //     'price' => $request->price,
        //     'desc' => $request->desc,
        //     'category_id' => $request->category_id,
        // ];

        // $dataUploadImage = $this->storageTraitUpload($request, 'product_image', 'product');

        // // dd($dataUploadImage);
        // if(!empty($dataUploadImage)){
        //     $dataProductCreate['product_image'] = $dataUploadImage['file_path'];
        // }

        // Product::create($dataProductCreate);

        // $cc = $request->all();
        // dd($cc);
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
      
        $data = array();
    	$data['productname'] = $request->productname;
        $data['product_slug'] = Str::slug($request->productname);
        $data['price'] = $request->price;
        $data['desc'] = $request->desc;
    	$data['category_id'] = $request->category_id;
        $data['feature_id'] = $request->feature_id;
        $data['created_at'] = $today;
        $get_image = $request->file('product_image');
        // dd($get_image);
 
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            \DB::table('products')->insert($data);
            
            return Redirect::to('product');
        }
        $data['product_image'] = '';
    	\DB::table('products')->insert($data);



        return Redirect::to('product');
    }

    public function edit($id){
        $products = Product::find($id); //tìm ở bảng sản phẩm có phần tử bằng id truyền vào
        $cate = CategoryProduct::get();
        $features = Feature::get();
        // dd($products);
        return view('admin.product.product_edit', compact('products', 'cate','features'));
    }

    public function update(Request $request, $id){
        // Product::find($id)->update([
        //     'productname' => $request->productname,
        //     'price' => $request->price,
        //     'desc' => $request->desc,
        // ]);
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $data = array();
    	$data['productname'] = $request->productname;
        $data['product_slug'] = Str::slug($request->productname);
        $data['price'] = $request->price;
        $data['desc'] = $request->desc;
    	$data['category_id'] = $request->category_id;
        $data['feature_id'] = $request->feature_id;
        $data['created_at'] = $today;
        $get_image = $request->file('product_image');
        // dd($get_image);
 
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            \DB::table('products')->where('id',$id)->update($data);
            return Redirect::to('product');
        }

        $get_curent_image = Product::find($id);
        
        $data['product_image'] =  $get_curent_image->product_image;
    	// \DB::table('products')->update($data);
        \DB::table('products')->where('id',$id)->update($data);

        return Redirect::to('product');
    }

    public function delete($id){
        Product::find($id)->delete();
        
        return Redirect::to('product');
    }
}
