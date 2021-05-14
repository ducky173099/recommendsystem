{{-- <html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @include('component.header')
        <div class="container">
            
            @yield('content')
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('adminpage/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('adminpage/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('component.sidebar')
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

               @include('component.header')

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

            <!-- Footer -->
            @include('component.footer')
            <!-- End of Footer -->
        </div>

    </div>
    <script src="{{asset('adminpage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminpage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('adminpage/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('adminpage/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('adminpage/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('adminpage/js/demo/chart-pie-demo.js')}}"></script>
</body>
</html>