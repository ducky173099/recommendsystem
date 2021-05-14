@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Sửa user'])
<form class="user" action="{{url('/user/update-user',['id' => $users->id])}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>User name</label>
            <input type="text" value="{{$users->username}}" name="username" class="form-control form-control-user"
                placeholder="User Name">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Email</label>
            <input type="text" value="{{$users->email}}" name="email" class="form-control form-control-user"
                placeholder="Email">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Password</label>
            <input type="text" value="{{$users->password}}" name="password" class="form-control form-control-user"
                placeholder="Password">
        </div>
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        <button type="submit"  value="update user">Update </button>
    </div>

    
</form>
@stop