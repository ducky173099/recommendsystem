@extends('layouts.page_master')
@section('title')
    <title>Register page</title>
@endsection
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
                    <span>Register</span>
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
                    <h2>Register</h2>
                    <form action="{{route('register_post')}}" method="POST">
                        @csrf
						<div class="group-input">
                            <label for="customer_name">Name *</label>
                            <input type="text" id="customer_name" name="customer_name">
                        </div>
                        <div class="group-input">
                            <label for="customer_email">email address *</label>
                            <input type="email" id="customer_email" name="customer_email">
                        </div>
                        <div class="group-input">
                            <label for="customer_password">Password *</label>
                            <input type="password" id="customer_password" name="customer_password">
                        </div>
                        <button type="submit" class="site-btn login-btn">Register</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{route('login_page')}}" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection







