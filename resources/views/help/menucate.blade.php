@if($cate_child)
	@if($parent != 0)
		<ul class="sub-menu">
	@endif
	@foreach($cate_child as $key => $item)
		@if($parent != 0)
			<li><a href="{{ route('front_cate', ['slug' => $item->cate_id]) }}">{{ $item->cate_name }}
		@else
			<li class="menu--left__item"><a href="{{ route('front_cate', ['slug' => $item->cate_id]) }}">{{ $item->cate_name }}</a>
		@endif
		@php Menu::MenuHead($data, $item->cate_id,'cate') @endphp
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