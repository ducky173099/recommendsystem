@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Thêm user'])
<form class="user" action="{{url('/user/create')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>User name</label>
            <input type="text" name="username" class="form-control form-control-user"
                placeholder="User Name">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Email</label>
            <input type="text" name="email" class="form-control form-control-user"
                placeholder="Email">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Password</label>
            <input type="text" name="password" class="form-control form-control-user"
                placeholder="Password">
        </div>
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        <button type="submit" value="Thêm user">Add</button>
    </div>

    
</form>
@stop