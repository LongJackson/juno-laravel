@if($cate_child)
	@if($parent != 0)
		<ul class="sub-menu">
	@endif
	@foreach($cate_child as $key => $item)
		@if($parent != 0)
			@if($key == 0)
				@php $product = Menu::getProductCateParent($parent) @endphp
				@if($product)
				<li class="new--products">
					<h4 class="title"><span>Mới nhất hôm nay</span></h4>
					<div class="row mt-3 px-3">
						<div class="col-7">
							<img class="img-fluid" src="{{ asset("/lib/public/storage/upload/images/".$product->thumbnail->img_name) }}" alt="">
						</div>
						<div class="col-5">
							<p class="title">
								{{ $product->prod_name }} - {{ $product->prod_code }}
							</p>
							<p class="price">{{ Menu::price($product->prod_price) }}<sup>đ</sup></p>
							<a href="{{ route( 'detail', ['slug' => $product->prod_id] ) }}">Xem chi tiết</a>
						</div>
					</div>
				</li>
				@endif
			@endif
			<li><a href="{{ route('front_cate', ['slug' => $item->cate_id]) }}"><i class="fa fa-caret-right"></i>{{ $item->cate_name }}
		@else
			<li class="menu--top__item">
				<a href="{{ route('front_cate', ['slug' => $item->cate_id]) }}">
				<img src="{{ asset("/lib/public/storage/upload/images/".$item->image->img_name) }}" alt=""><span class="title">{{ $item->cate_name }}</span></a>
		@endif
		@php Menu::MenuHead($data, $item->cate_id) @endphp
		@if($parent != 0)
		    </a></li>
		@else
		    </li>
		@endif
	@endforeach
	@if($parent != 0)
		</ul>
	@endif
@endif

