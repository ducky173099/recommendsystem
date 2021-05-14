

@extends('layouts.page_master')
@section('title')
    <title>Cart page</title>
@endsection

@section('content')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <?php
            $productAddToCart = Cart::content();
        ?>
        @if ($productAddToCart->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $message = Session::get('message');
                                    if ($message == true) {
                                        echo '<span class="text-alert errr">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                ?>
                                @foreach($productAddToCart as $key => $ItemAddToCart)
                                <tr>
                                    <td class="cart__product__item">
                                        <img style="max-width: 22%;" src="/public/uploads/product/{{$ItemAddToCart->options->image}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$ItemAddToCart->name}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{number_format($ItemAddToCart->price,0,',','.')}}</td>
                                    <td class="cart__quantity">
                                        <form action="{{route('update_cart_qty')}}" method="post">
                                            @csrf
                                            <div class="pro-qty" style="width: 75px;">
                                                <input style="width: 40px;" type="text" min="1" name="cart_qty" value="{{$ItemAddToCart->qty}}">
                                            </div>
                                            <input type="hidden" value="{{$ItemAddToCart->rowId}}" name="rowId_cart" class="form-control rowId_cart">
                                            <input style="width: 65px; background: gray;font-size: 9px;transform: translateY(-20px);" type="submit" value="Cập nhật" name="update_qty" class="btn btn-default update sm">
                                        </form>
                                    </td>
                                    <td class="cart__total">{{number_format($ItemAddToCart->subtotal,0,',','.')}} Đ</td>
                                    <td class="cart__close">
                                        <a class="cart_quantity_delete" href="{{route('delete_cart', $ItemAddToCart->rowId)}}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{route('shop')}}">Continue Shopping</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div> --}}
                </div>
                
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <form action="{{url('/order')}}" method="post">
                            @csrf
                            <ul>
                                @php
                                    $total = 0;
                                    $totalPrice = Cart::priceTotal();
                                    // $removeComma = str_replace(",", "", Cart::priceTotal());
                                    $removeDot = substr($totalPrice, 0, strpos($totalPrice, '.'));
                                    $total = $removeDot;
                                @endphp
                                <li>Total <span>{{$total}}</span></li>
                            </ul>
                            <button class="btn primary-btn check_out" type="submit">Proceed to checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else 
            <div class="container">
                <h2>Bạn chưa đặt sản phẩm nào, vui lòng click bên dưới để chọn sản phẩm mua nhé hiu hiu (^.^)</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="cart__btn">
                            <a href="{{route('shop')}}">Go shoppinggg</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
       
    </section>
    <!-- Shop Cart Section End -->
@endsection




