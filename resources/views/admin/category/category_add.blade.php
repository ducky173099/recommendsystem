@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Thêm category'])
<form class="user" action="{{url('/category/create')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Tên danh mục</label>
            <input type="text" name="category_name" class="form-control form-control-user"
                placeholder="Tên danh mục">
        </div>
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        {{-- button có type bằng submit, sau khi bấm sẽ chạy vào form --}}
        <button type="submit" value="Thêm user">Add</button> 
    </div>

    
</form>
@stop