@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Thêm product'])
<form class="user" action="{{url('/product/create')}}" method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Tên sản phẩm</label>
            <input type="text" name="productname" class="form-control form-control-user"
                placeholder="Nhập tên sản phẩm">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Feature product</label>
            <select name="feature_id">
                <option value="">Feature</option>
                @foreach ($features as $key => $item)
                    <option value="{{$item->id}}">{{$item->feature_name}}</option>
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
                    <option value="{{$itemCate->id}}">{{$itemCate->category_name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Giá sản phẩm</label>
            <input type="text" name="price" class="form-control form-control-user"
                placeholder="Nhập giá sản phẩm">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Nội dung</label>
            <textarea rows="8" class="form-control" name="desc" id="exampleInputPassword1"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label>Ảnh đại diện</label>
        <input type="file" name="product_image" class="form-control-file" >
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        <button type="submit" value="Thêm user">Add</button>
    </div>

    
</form>
@stop