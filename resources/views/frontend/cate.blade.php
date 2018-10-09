@extends('frontend.layout.blank')
@section('main')
		
	<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url( '/' ) }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">{{ $cate->cate_name }}</li>
			</ol>
			<div class="row">
				<div class="col-md-2">
					<div id="menu-cate">
						<ul class="menu-left">
							{!! Menu::menuHead($cate_all,0,'cate') !!}
						</ul>
					</div>
				</div>
				<div class="col-md-10">
					<div id="products">
						<div class="row">
							<div class="col-12">
								<h1 class="title"><span>Bạn đang xem:</span>  {{ $cate->cate_name }}</h1>
							</div>
							@foreach($products as $product)
							<div class="col-xl-3 col-md-4 col-sm-6 col-12 product--item">
								<div class="product--item--top">
									<a href="{{ route( 'detail', ['slug' => $product->prod_id]) }}">
										@foreach($product->gallery as $key => $image)
										@if ($key < 2)
										<img class="img-fluid" src="{{ asset("/storage/upload/images/".$image->img_name)}}" alt="">
										@endif
										@endforeach
									</a>
								</div>
								<div class="product--item--bottom">
									<div class="rating">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									</div>
									<p class="code"><a href="{{ route( 'detail', ['slug' => $product->prod_id]) }}"> {{ $product->prod_name }} </a></p>
									<p class="price">{{ Menu::price($product->prod_price) }}<sup>đ</sup></p>
									<div class="img-lazi">
										@foreach($product->item as $key =>  $item)
											<img @if($key == 0) class="active" @endif src="{{ asset("/storage/upload/images/".$item->thumbnail->img_name)}}" alt="">
										@endforeach
									</div>
								</div>
							</div>
							<!-- /.product--item -->
							@endforeach
							</div>
						<div class="row my-3">
							<div class="col-3 offset-9">
								<nav aria-label="Page navigation example">
									{{ $products->links() }}
								</nav>
							</div>
						</div>
					</div>
					<!-- /#products -->
				</div>
			</div>
		</div>
	</div>

@stop

@section('footer')
<script>
	$(document).ready(function(){
		var url = $(location).attr('href');
		var list = $('.menu-left a');
		list.each(function(index, el) {
			if ($(el).attr('href') == url) {
				$(el).next('.sub-menu').addClass('active');
				$(el).parentsUntil('ul').addClass('active')
				$(el).parentsUntil('.menu--left__item').addClass('active')
			}
		});
	});
</script>
@stop