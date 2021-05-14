<?php

namespace App\Http\Controllers;
use App\Models\CategoryProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function category_show(){
        $categoy_products = CategoryProduct::latest()->paginate(10);
        return view('admin.category.category_show', compact('categoy_products'));
    }

    public function create(){

        return view('admin.category.category_add');

    }

    public function store(Request $request){

        // dd($request->all());
        CategoryProduct::create([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
        ]);

        //tất cả return sẽ trả về 1 đường dẫn
        return Redirect::to('category');
    }
    public function edit($id){
        $categoy_products = CategoryProduct::find($id);

        //RETURN view trả về đường dẫn của trang view
        return view('admin.category.category_edit', compact('categoy_products'));

    }
    public function update(Request $request, $id){
        CategoryProduct::find($id)->update([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
            
        ]);
        return Redirect::to('category');

    }
    public function delete($id){
        CategoryProduct::find($id)->delete();
        
        return Redirect::to('category');
    }


}
