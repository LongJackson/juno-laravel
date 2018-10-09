	<!-- HEADER -->
	<header id="header">

		<!-- HEADER-TOP -->
		<div id="header_top" >
			<div class="container">
				<div class="row">
					<div class="col-6">
						<div class="row">
							<div class="col-3">
								<div class="logo"><img class="img-fluid" src="access/image/logo.png" alt=""></div>
							</div>
							<div class="col-9">
								<form class="search" action="{{ route('search') }}">
									<input name="q" type="text" placeholder="Bạn muốn tìm gì ?" class="form-control">
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="row right_top">
							<div class="col-md-5 item">
								<i class="fa fa-phone icon"></i>
								<span>BÁN HÀNG: <strong>1800 8198</strong> (miễn phí)</span>
							</div>
							<div class="col-md-4 item">
								<i class="fa fa-building icon"></i>
								<a href="#"><span>Xem hệ thống <strong>64</strong> cửa hàng</span></a>
							</div>
							<div class="col-md-3 item">
								<div id="cart"><a href="{{ route( 'cart' ) }}">
									<i class="fa fa-shopping-bag icon bg_c4 cl_c1"></i> <span>{{ Cart::count() }} Sản phẩm</span>
									</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- END HEADER-TOP -->

		<!-- MENU-TOP -->
		<div id="menu-top">
			<nav class="container">
				<ul class="menu--top">
					<li class="menu--top__item">
						<a href="{{ url('/') }}">
							<img src="access/image/ic10.png" alt="">
							<span class="title">Trang chủ</span>
						</a>
					</li>
					{!! Menu::menuHead($category) !!}
					
					<!-- ./menu--top__item -->
					<li class="menu--top__item">
						<a href="#">
							<img src="access/image/ic8.png" alt="">
							<span class="title">Túi xách</span>
						</a>
					</li>
					<!-- ./menu--top__item -->
					<li class="menu--top__item">
						<a href="#">
							<img src="access/image/ic9.png" alt="">
							<span class="title">Túi xách</span>
						</a>
					</li>
					<!-- ./menu--top__item -->
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div>
		<!-- END MENU-TOP -->
	</header>
	<!-- END HEADER -->