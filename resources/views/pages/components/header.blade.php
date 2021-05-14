<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="eshopper/#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="eshopper/#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="eshopper/#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="eshopper/#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="eshopper/#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="eshopper/#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="eshopper/#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="eshopper/index.html"><img src="eshopper/images/home/logo.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="eshopper/#">Canada</a></li>
                                <li><a href="eshopper/#">UK</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="eshopper/#">Canadian Dollar</a></li>
                                <li><a href="eshopper/#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="eshopper/#"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="eshopper/#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="eshopper/checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="eshopper/cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            {{-- <li><a href="eshopper/login.html"><i class="fa fa-lock"></i> Login</a></li> --}}
                            <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != null) {
                            ?>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                            <?php
                                }else {
                            ?>
                                <li><a href="{{url('/form-register')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="eshopper/#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="eshopper/shop.html">Products</a></li>
                                    <li><a href="eshopper/product-details.html">Product Details</a></li> 
                                    <li><a href="eshopper/checkout.html">Checkout</a></li> 
                                    <li><a href="eshopper/cart.html">Cart</a></li> 
                                    {{-- <li><a href="{{url('/form-register')}}">Đăng kí</a></li>  --}}
                                   
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="eshopper/#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="eshopper/blog.html">Blog List</a></li>
                                    <li><a href="eshopper/blog-single.html">Blog Single</a></li>
                                </ul>
                            </li> 
                            <li><a href="eshopper/contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{route('search')}}" method="post">
                        {{ csrf_field() }}
                        <div class="search_box pull-right">
                            <input id="keyword_id" type="text" name="keyword" placeholder="Tìm kiếm"/>
                            <div id="search_ajax">

                            </div>
                            <input style="margin: 0px; color:black" type="submit" name="search_item" class="btn btn-primary btn-sm" value="Tìm kiếm"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->