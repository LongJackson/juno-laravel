@extends('frontend.layout.blank')
@section('main')
	<div class="container">
				<div id="search" class="row">
					<div class="col-12">
						<h1>TÌM KIẾM</h1>
						<p>Đã tìm thấy tất cả: ({{ count($products) }} sản phẩm)</p>
					</div>
				</div>
				<div id="products" class="row mb-5">
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
							{{ $products->appends(['q' => $value])->links() }}
						</nav>
					</div>
				</div>
			</div>
@stop