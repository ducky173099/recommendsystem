<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    {{-- <link href="{{asset('eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('eshopper/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('eshopper/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="eshopper/js/html5shiv.js"></script>
    <script src="eshopper/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="eshopper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('eshopper/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('eshopper/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('eshopper/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('eshopper/images/ico/apple-touch-icon-57-precomposed.png')}}"> --}}

     <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
     rel="stylesheet">
 
     <!-- Css Styles -->
     <link rel="stylesheet" href="{{asset('ashion/css/bootstrap.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/font-awesome.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/elegant-icons.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/jquery-ui.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/magnific-popup.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/owl.carousel.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/slicknav.min.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('ashion/css/style.css')}}" type="text/css">
     <link rel="stylesheet" href="{{asset('css/pages.css')}}" type="text/css">
     @yield('css')

</head><!--/head-->

<body>
    <?php
        // $customer_id = Session::get('customer_id');
        // echo $customer_id;
    ?>
     <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
     <!-- Offcanvas Menu End -->

    @include('pages.components.header_main')
	
    @yield('content')
	
    @include('pages.components.footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="{{url('/search')}}" method="post">
                {{ csrf_field() }}
                <div class="search_box pull-right">
                    <div style="width: 100%;display: flex;">
                        <input style="width: 80%;" id="keyword_id" type="text" name="keyword"  placeholder="Search here....."/>
                        <input 
                            style="
                            width: 20%;
                            color: black;
                            font-size: 17px;
                            border: none;
                            background-color: #f5f5f5;" 
                            type="submit" name="search_item" 
                            class="btn btn-primary btn-sm" 
                            value="Tìm kiếm"
                        />
                    </div>
                    <div id="search_ajax"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- Search End -->
  
    {{-- <script src="{{asset('eshopper/js/jquery.js')}}"></script>
	<script src="{{asset('eshopper/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('eshopper/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('eshopper/js/price-range.js')}}"></script>
    <script src="{{asset('eshopper/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('eshopper/js/main.js')}}"></script> --}}

    <!-- Js Plugins -->
    <script src="{{asset('ashion/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('ashion/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('ashion/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('ashion/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('ashion/js/mixitup.min.js')}}"></script>
    <script src="{{asset('ashion/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('ashion/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('ashion/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ashion/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('ashion/js/main.js')}}"></script>


    {{-- script cho search auto complete --}}
    <script type="text/javascript">
        $('#keyword_id').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/autocomplate-ajax')}}',
                    method: 'POST',
                    data: {query:query,_token:_token},
                    success:function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else{
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_search', function(){
            $('#keyword_id').val($(this).text());
            $('#search_ajax').fadeOut();
        });

    </script>

    {{-- script rating --}}
    <script type="text/javascript">
        //hàm thay đổi màu khi hover sao
        function remove_background(product_id){
            for(var count = 1; count <= 5; count++){
                $('#'+product_id+'-'+count).css('color','#ccc');
            }
        }

        //hover chuột đánh giá sao
        $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data('index');
            var product_id = $(this).data('product_id');

            // alert(index);
            // alert(product_id);

            remove_background(product_id);

            for(var count = 1; count <= index; count++){
                $('#'+product_id+'-'+count).css('color','#ffcc00');
            }
        });

        //hàm nhả chuột k đánh giá
        $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data('index');
            var product_id = $(this).data('product_id');
            var rating = $(this).data('rating');

            remove_background(product_id);

            for(var count = 1; count <= rating; count++){
                $('#'+product_id+'-'+count).css('color','#ffcc00');
            }
        });

        //hàm click sao
        $(document).on('click', '.rating', function(){
            var index = $(this).data('index');
            var product_id = $(this).data('product_id');
            var product_name = $(this).data('product_name');
            var customer_id = $(this).data('customer_id');
            var _token = $('input[name="_token"]').val();

// alert(index);
// alert(product_id);
// alert(product_name);
// alert(_token);
            $.ajax({
                url: '{{url('/insert-rating')}}',
                method: 'POST',
                data: {index:index,customer_id:customer_id,product_id:product_id,product_name:product_name,_token:_token},
                success:function(data){
                    if(data == 'done'){
                        alert('Bạn đã đánh giá ' + index + ' trên 5 sao');
                        location.reload();
                    } else{
                        alert('Lỗi rồi bạn :(((');
                        location.reload();
                    }
                }
            });

    
        });


    </script>

</body>
</html>