<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{url('').'/assets/frontend/'}}">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bs.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/lightgallery.min.css">
	<link rel="stylesheet" href="css/pnotify.custom.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/lightslider.js"></script>
	<script src="js/myscript.js"></script>
	<title>@if(isset($title)) {{ $title }}  @endif</title>
</head>
<body>
@include('frontend.layout.header')
		<!-- WRAPPER -->
	<div id="main">
		@yield('main')
	</div>
	<!-- END WRAPPER -->
@include('frontend.layout.footer')
<script src="js/pnotify.custom.min.js"></script>
@include('errors.err')
@yield('footer')
</body>
</html>