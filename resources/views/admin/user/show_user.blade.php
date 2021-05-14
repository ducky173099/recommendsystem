@extends('layouts.master')

@section('content')
    @include('component.titleheader', ['name' => 'Danh sách user'])
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('/user/add-user')}}">Thêm user</a>
            {{-- <a href="{{url('/user/edit-user')}}">Sửa user</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($users as $key => $userItem)
                            <tr>
                                <td>{{$userItem->id}}</td>
                                <td>{{$userItem->username}}</td>
                                <td>{{$userItem->email}}</td>
                                <td>
                                    <a href="{{url('/user/edit-user', ['id' => $userItem->id])}}" class="btn btn-default">Edit</a>
                                    {{-- <a href="{{url('/user/delete-user', ['id' => $userItem->id])}}" class="btn btn-danger">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop