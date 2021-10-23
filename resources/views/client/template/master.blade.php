<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kl-webmedia.com/demo/trendify/home-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 07:45:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trendify - Fashion eCommerce HTML5 Template</title>

    <!-- BOOTSTRAP -->
    @include('client.template.css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home3">

    <!-- header -->
   @include('client.template.header')
    <!-- / header -->

    <!-- slider -->
    <div class="content">
        <div class="container">
            <div class="row">
               @yield('content')
               @if (Request::segment(3)=='hienthi')
                @include('client.template.sidebar')
               @endif
            </div>
        </div>
    </div>
    <!-- / content -->


    <!-- footer -->
   @include('client.template.footer')
    <!-- / footer -->

    <!-- jQuery -->
    @include('client.template.js')
    @stack('Add-Cart')
    @stack('Add-list-cart')
    @stack('Add-Cart-product')
    @stack('input-total-price')
    @stack('addCity')
</body>

<!-- Mirrored from kl-webmedia.com/demo/trendify/home-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 07:46:11 GMT -->
</html>
