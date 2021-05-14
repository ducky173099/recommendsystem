@extends('layouts.master')

@section('content')
    @include('component.titleheader', ['name' => 'Danh mục sản phẩm'])
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('/category/category-add')}}">Thêm category</a>
            {{-- <a href="{{url('/category/edit-category')}}">Sửa category</a> --}}
            

    
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục sản phẩm</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($categoy_products as $key => $categoryItem)
                            <tr>
                                <td>{{$categoryItem->id}}</td>
                                <td>{{$categoryItem->category_name}}</td>
                                <td>{{$categoryItem->slug}}</td>
                                <td>
                                    <a href="{{url('/category/category-edit', ['id' => $categoryItem->id])}}" class="btn btn-default">Edit</a>
                                    <a href="{{url('/category/category-delete', ['id' => $categoryItem->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop