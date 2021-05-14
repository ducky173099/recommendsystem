@extends('layouts.master')

@section('content')
@include('component.titleheader', ['name' => 'Thêm Feature'])
<form class="user" action="{{url('/feature/create')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label>Tên feature</label>
            <input type="text" name="feature_name" class="form-control form-control-user"
                placeholder="Tên feature">
        </div>
    </div>
    {{-- <div class="form-group">
        <label >polyester</label>
        <select class="form-control " name="post_status">
            @if($get_posts->post_status == 0)
                <option selected value="0">Hiển thị</option>
                <option value="1">Ẩn</option>
            @else
                <option value="0">Hiển thị</option>
                <option selected value="1">Ẩn</option>
            @endif
        </select>
    </div> --}}


    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="polyester" id="polyester">
        <label class="form-check-label" for="polyester">polyester</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="hood" id="hood">
        <label class="form-check-label" for="hood">hood</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="zipper" id="zipper">
        <label class="form-check-label" for="zipper">zipper</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="mint_blue" id="mint_blue">
        <label class="form-check-label" for="mint_blue">mint_blue</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="mild_weather" id="mild_weather">
        <label class="form-check-label" for="mild_weather">mild_weather</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="fleece" id="fleece">
        <label class="form-check-label" for="fleece">fleece</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="white" id="white">
        <label class="form-check-label" for="white">white</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="pink" id="pink">
        <label class="form-check-label" for="pink">pink</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="cold_weather" id="cold_weather">
        <label class="form-check-label" for="cold_weather">cold_weather</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="windproof" id="windproof">
        <label class="form-check-label" for="windproof">windproof</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="water_resistant" id="water_resistant">
        <label class="form-check-label" for="water_resistant">water_resistant</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="blue" id="blue">
        <label class="form-check-label" for="blue">blue</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="gray" id="gray">
        <label class="form-check-label" for="gray">gray</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="half_zipper" id="half_zipper">
        <label class="form-check-label" for="half_zipper">half_zipper</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="brown" id="brown">
        <label class="form-check-label" for="brown">brown</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="purple" id="purple">
        <label class="form-check-label" for="purple">purple</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="checkbox" name="high_collar" id="high_collar">
        <label class="form-check-label" for="high_collar">high_collar</label>
    </div>

    <div class="col-sm-6 mb-3 mb-sm-0">
        <button type="submit" value="Thêm user">Add</button> 
    </div>

    
</form>
@stop