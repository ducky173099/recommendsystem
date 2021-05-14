@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Sửa product'])
<form class="user" action="{{url('/product/update-product',['id' => $products->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Tên sản phẩm</label>
            <input type="text" value="{{$products->productname}}" name="productname" class="form-control form-control-user"
                placeholder="Nhập tên sản phẩm">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Feature product</label>
            <select name="feature_id">
                <option value="">Feature</option>
                @foreach ($features as $key => $item)
                    <option {{$item->id == $products->feature_id  ? 'selected' : ''}} value="{{$item->id}}">{{$item->feature_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Danh Mục sản phẩm</label>
            <select name="category_id">
                <option value="">Chọn danh mục</option>
                @foreach ($cate as $itemCate)
                    <option {{$itemCate->id == $products->category_id ? 'selected' : ''}} value="{{$itemCate->id}}">{{$itemCate->category_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Giá sản phẩm</label>
            <input type="text" value="{{$products->price}}"  name="price" class="form-control form-control-user"
                placeholder="Nhập giá sản phẩm">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Nội dung</label>
            <textarea rows="8" class="form-control" name="desc" >{{$products->desc}} </textarea>
        </div>
    </div>

    <div class="form-group">
        <label>Ảnh đại diện</label>
        <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
        {{-- <div class="col-md-6 container_feature_image">
            <div class="row"> --}}
        <img style="width: 100px;height: 100px;" src="{{URL::to('public/uploads/product/'.$products->product_image)}}" alt="">
            {{-- </div> --}}
        {{-- </div> --}}
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        <button type="submit" value="update product">Update sản phẩm</button>
    </div>

    
</form>
@stop