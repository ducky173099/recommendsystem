

@extends('layouts.page_master')

@section('content')
 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Women’s </a>
                    <span>Essential structured blazer</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <?php
        $customer_id = Session::get('customer_id');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img style="height: 500px" src="/public/uploads/product/{{$product_detail->product_image}}" alt="">
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$product_detail->productname}}</h3>
                    <div class="rating">
                        {{-- <ul class="list-inline" style="display: flex">
                            <li>Rating :</li>
                            @for($count = 1; $count <= 5; $count++)
                            @php
                                if ($count <= $ratings) {
                                    $color = 'color:#ffcc00;';
                                } else {
                                    $color = 'color:#ccc;';
                                }
                            @endphp
                                <li
                                    id="{{$product_detail->id}}-{{$count}}"
                                    data-index="{{$count}}"
                                    data-product_id="{{$product_detail->id}}"
                                    data-product_name="{{$product_detail->productname}}"
                                    data-customer_id="{{$customer_id}}"
                                    data-rating="{{$ratings}}"
                                    class="rating"
                                    style="cursor:pointer; {{$color}}font-size:18px;"
                                >&#9733;</li>
                            @endfor
                        </ul> --}}
                        @foreach ($recommendation as $product_id => $rating)
                            @if ($product_detail->id === $product_id)
                                <ul class="list-inline" style="display: flex">
                                    <li>Rating :</li>
                                    @for($count = 1; $count <= 5; $count++)
                                    @php
                                        if ($count <= $rating) {    
                                            $color = 'color:#ffcc00;';
                                        } else {
                                            $color = 'color:#ccc;';
                                        }
                                    @endphp
                                    {{-- {{$rating}} sao --}}
                                    <li
                                    id="{{$product_detail->id}}-{{$count}}"
                                    data-index="{{$count}}"
                                    data-product_id="{{$product_detail->id}}"
                                    data-product_name="{{$product_detail->productname}}"
                                    data-customer_id="{{$customer_id}}"
                                    data-rating="{{$rating}}"
                                    {{-- class="rating" --}}
                                    style="{{$color}}font-size:18px;"
                                    >&#9733;</li>
                                    @endfor
                                </ul>
                            @endif
                        @endforeach
                    </div>
                    <div class="product__details__price">{{number_format($product_detail->price,0,',','.')}} Đ</div>
                    <div class="product__price">{{$product_detail->feature->feature_name}}</div>
                    <p>{{$product_detail->desc}}</p>
                    <form action="{{route('add_to_cart')}}" method="post">
                        @csrf
                        <div class="product__details__button">
                            <input type="hidden" name="product_id_hidden" value="{{$product_detail->id}}" />
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" name="qty" min="1" value="1">
                                </div>
                            </div>
                            <button style="border: none" type="submit" class="cart-btn">
                                <span class="icon_bag_alt"></span> Add to cart</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RECOMMEND PRODUCTS</h5>
                </div>
            </div>
            @foreach ($products as $key => $item)
                @foreach ($recommendation as $product_id => $rating)
                    @if ($item->id === $product_id && $item->id != $product_detail->id)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('/public/uploads/product/'.$item->product_image.'')}}">
                                    <ul class="product__hover">
                                        <li><a href="/public/uploads/product/{{$item->product_image}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="{{route('product_detail', ['product_slug' => $item->product_slug])}}"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6 class="overflow_hidden_text"><a  href="#">{{$item->productname}}</a></h6>
                                    <h6>Similarity: {{ round($item->similarity * 100, 1) }}%</h6>
                                    <div class="rating">
                                        <ul class="list-inline" style="display: flex;text-align: center;justify-content: center;">
                                            @for($count = 1; $count <= 5; $count++)
                                            @php
                                                if ($count <= $rating) {    
                                                    $color = 'color:#ffcc00;';
                                                } else {
                                                    $color = 'color:#ccc;';
                                                }
                                            @endphp
                                            {{-- {{$rating}} sao --}}
                                            <li
                                            id="{{$item->id}}-{{$count}}"
                                            data-index="{{$count}}"
                                            data-product_id="{{$item->id}}"
                                            data-product_name="{{$item->productname}}"
                                            data-customer_id="{{$customer_id}}"
                                            data-rating="{{$rating}}"
                                            {{-- class="rating" --}}
                                            style="{{$color}}font-size:18px;"
                                            >&#9733;</li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="product__price">{{number_format($item->price,0,',','.')}} Đ</div>
                       
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- Product Details Section End -->
@stop