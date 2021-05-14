

@extends('layouts.page_master')
@section('css')
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('fashi/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/style.css')}}" type="text/css">
@endsection

@section('content')
  <!-- Breadcrumb Section Begin -->
  <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <?php
                        $message = Session::get('message');
                        if ($message == true) {
                            echo '<span class="text-alert errr">'.$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                    <form action="{{route('login_post')}}" method="POST">
                        @csrf
                        <div class="group-input">
                            <label for="customer_email">email address *</label>
                            <input type="email" id="customer_email" name="customer_email">
                        </div>
                        <div class="group-input">
                            <label for="customer_password">Password *</label>
                            <input type="password" id="customer_password" name="customer_password">
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{route('register_page')}}" class="or-login">Or Create An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection




