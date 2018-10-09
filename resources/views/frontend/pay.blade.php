<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{url('').'/assets/frontend/'}}">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bs.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/default.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Trang Chủ</title>
</head>
<body>
	<div id="main">
		<div id="checkout">
			<div class="left">
				<div class="container">
					<div id="head" class="row">
						<div class="col-12">
							<img src="access/image/logo.png" alt="" class="">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
								<li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
								<li class="breadcrumb-item active">Thanh Toán</li>
							</ol>
						</div>
					</div>
					<div id="form-check" class="row">
						<div class="col-12">
							<h3 class="title">Thông tin giao hàng</h3>
						</div>
						<div class="col-12">
							<form action="" method="post" class="row">
								<div class="col-12">
									<input type="text" required id="name" name="name" class="form-control">
									<label for="name">Họ và tên</label>
								</div>
								<div class="col-8">
									<input id="email" required type="text" name="email" class="form-control">
									<label for="name">Email</label>
								</div>
								<div class="col-4">
									<input type="number" name="phone" required class="form-control">
									<label for="name">Số điện thoại</label>
								</div>
								<div class="col-12">
									<input type="text" name="address" required class="form-control">
									<label for="name">Địa chỉ</label>
								</div>
								<div class="col-4">
									<input type="text" name="tinh" required class="form-control">
									<label for="name">Tỉnh/thành</label>
								</div>
								<div class="col-4">
									<input type="text" name="quan" required class="form-control">
									<label for="name">Quận/huyện</label>
								</div>
								<div class="col-4">
									<input type="text" required name="xa" class="form-control">
									<label for="name">Xã/phường</label>
								</div>
								<div class="col-12 my-3">
									<textarea placeholder="Ghi chú đơn hàng" name="note" class="form-control" id="" ></textarea>
								</div>

								<div class="col-4 mb-2">
									<a href="#" class="back-cart"><i class="fa fa-chevron-left" ></i> Giỏ hàng</a>
								</div>
								{{ csrf_field() }}
								<div class="col-4 offset-4 mb-2">
									<button class="btn btn-danger btn-block btn-md">Hoàn tất đơn hàng</button>
								</div>
								</form>
								
						</div>

					</div>
				</div>
			</div>
			<div class="right">
				<div class="container">
					<div id="cart-checkout" class="row">
						<div class="col-12">
							<table class="table">
								@foreach(Cart::content() as $cart)
								<tr>
									<td>
										<img src="{{ asset("/lib/public/storage/upload/images/".$cart->options->thumnail)}}" class="img-product" alt="">
									</td>
									<td>
										<p class="name">{{ $cart->name }} TXN107</p>
										<p class="attr"> @if($cart->options->size){{ $cart->options->size }}  @endif / @if($cart->options->color){{ $cart->options->color }}  @endif </p>
									</td>
									<td><p class="price">{{ Menu::price($cart->price) }} <sup>đ</sup></p></td>
								</tr>
								@endforeach
								<tfoot>
									<th colspan="2">Tổng cộng</th>
									<th ><p class="price float-right">{{ Cart::total() }} <sup>đ</sup></p></th>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>