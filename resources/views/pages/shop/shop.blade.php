

@extends('layouts.page_master')

@section('content')

<section>
       <!-- Breadcrumb Begin -->
       <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <?php
            $customer_id = Session::get('customer_id');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        @include('pages.components.sidebar_category');
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @foreach ($products as $key => $item)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('/public/uploads/product/'.$item->product_image.'')}}">
                                        <ul class="product__hover">
                                            <li><a href="/public/uploads/product/{{$item->product_image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="{{route('product_detail', ['product_slug' => $item->product_slug])}}"><span class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6 class="overflow_hidden_text"><a href="#">{{$item->productname}}</a></h6>
                                        
                                        <div class="product__price">{{number_format($item->price,0,',','.')}} Đ</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    </div>
                  
                </div>
                <div class="col-md-12" >
                    <div style="float: right">
                        {{$products->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
     
    </section>
    <!-- Shop Section End -->
  
</section>
@stop