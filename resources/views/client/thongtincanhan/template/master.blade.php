<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kl-webmedia.com/demo/trendify/shop-grid-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 07:50:23 GMT -->
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

<body>

    <!-- header -->
    @include('client.template.header')
    <!-- / header -->

		<!-- page title -->
	<div class="page_title_area" style="margin-bottom: 0px">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="page_title">
						<h1>CÀI ĐẶT THÔNG TIN</h1>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="bredcrumb">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">Men's</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ page title -->


	<!-- content area -->
	<div class="content">
		<div class="container border border-dark ">
			<div class="row">
				<div class="col-md-9 col-md-push-3 col-sm-12" style="border: 1px solid; margin-bottom:100px ; margin-top:35px" >
					@yield('content')
					<!-- / pagination -->
				</div>
                    @include('client.thongtincanhan.template.sidebar')
			</div>
		</div>
	</div>
	<!-- / content area -->

	    <!-- footer -->
   @include('client.template.footer')
    <!-- / footer -->

    <!-- jQuery -->
  @include('client.template.js')
</body>

<!-- Mirrored from kl-webmedia.com/demo/trendify/shop-grid-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 07:50:29 GMT -->
</html>
