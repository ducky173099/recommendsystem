<!-- Header Section Begin -->
<header class="header">
    <?php
        $productAddToCart = Cart::content();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="@if(Route::is('home')) {{ 'active' }} @endif"><a href="{{route('home')}}">Home</a></li>
                        <li class="@if(Route::is('shop')) {{ 'active' }} @endif"><a href="{{route('shop')}}">Shop</a></li>
                        <li class="@if(Route::is('product_by_category')) {{ 'active' }} @endif"><a href="#">Category</a>
                            <ul class="dropdown">
                                @foreach ($categoy_products as $key => $item)
                                    <li><a href="{{route('product_by_category',['slug' => $item->slug])}}">{{$item->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @if (Session::get('customer_id'))
                            <a href="{{route('logout')}}">Logout</a>
                        @else
                            <a href="{{route('login_page')}}">Login</a>
                            <a href="{{route('register_page')}}">Register</a>
                        @endif
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="{{route('show_cart')}}"><span class="icon_bag_alt"></span>
                            @if ($productAddToCart->count() > 0)
                                <div class="tip">{{$productAddToCart->count() }}</div>
                            @endif
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->