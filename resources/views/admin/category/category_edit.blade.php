@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Sửa category'])
<form class="user" action="{{url('/category/category-update',['id' => $categoy_products->id])}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Tên danh mục</label>
            <input type="text" value="{{$categoy_products->category_name}}" name="category_name" class="form-control form-control-user"
                placeholder="Tên danh mục">
        </div>
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        {{-- button có type bằng submit, sau khi bấm sẽ chạy vào form --}}
        <button type="submit" value="Update category">Update</button> 
    </div>

    
</form>
@stop