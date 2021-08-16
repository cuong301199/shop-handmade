<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	@include('client.template.css')

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		
		@include('client.template.header')
	
    	@yield('content')
	
		@include('client.template.footer')
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	@include('client.template.js')

	</body>
</html>

