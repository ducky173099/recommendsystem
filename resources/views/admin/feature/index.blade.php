@extends('layouts.master')

@section('content')
    @include('component.titleheader', ['name' => 'Feature product'])
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url('/feature/feature-add')}}">Thêm feature</a>
    
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên feature</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($features as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->feature_name}}</td>
                                <td>
                                    <a href="{{url('/feature/feature-edit', ['id' => $item->id])}}" class="btn btn-default">Edit</a>
                                    <a href="{{url('/feature/feature-delete', ['id' => $item->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  
    </div>
@stop