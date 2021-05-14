@extends('layouts.master')

@section('content')
    @include('component.titleheader', ['name' => 'Danh sách sản phẩm'])
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('/product/add-product')}}">Thêm product</a>
            {{-- <a href="{{url('/product/edit-product')}}">Sửa product</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>giá</th>
                            <th>Nội dung</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($products as $key => $productItem)
                            <tr>
                                <td>{{$productItem->id}}</td>
                                <td>{{$productItem->productname}}</td>
                                <td>
                                    <img style="width: 100px;height: 100px;" src="public/uploads/product/{{ $productItem->product_image }}"/>
                                </td>
                                <td>{{$productItem->price}}</td>
                                <td>{{$productItem->desc}}</td>
                                <td>
                                    <a href="{{url('/product/edit-product', ['id' => $productItem->id])}}" class="btn btn-default">Edit</a>
                                    <a href="{{url('/product/delete-product', ['id' => $productItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop