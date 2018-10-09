@extends('frontend.layout.blank')
@section('main')
<div id="cart">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="title">Giỏ hàng của bạn: (<span>{{ Cart::count() }} sản phẩm</span>)</h1>
			</div>
			<div class="col-9">
				<table class="table">
					
				  <thead class="thead-inverse">
				    <tr>
				      <th></th>
				      <th>Thông tin</th>
				      <th>Số lượng</th>
				      <th>Giá</th>
				      <th></th>
				    </tr>
				  </thead>
				  
				  <tbody>
				  	@if(Cart::count() > 0)
				  	@foreach(Cart::content() as $cart)
				    <tr>
				    	{{-- {{ print_r($cart) }} --}}
				      <td><img width="80" src="{{ asset("/storage/upload/images/".$cart->options->thumnail)}}" alt=""></td>
				      <td>
				      	<p class="name">{{ $cart->name }}</p>
				      	@if($cart->options->color)<p>Màu: {{ $cart->options->color }}</p>@endif
				      	@if($cart->options->size)<p>Size: {{ $cart->options->size }}</p>@endif
				      </td>
				      <td><span class="amount">{{ $cart->qty }}</span></td>
				      <td>
				      	<p class="price">{{ Menu::price($cart->price) }} <sup>đ</sup></p>
				      
				      </td>
				      <td>
				      	
				      	<a href="{{ route( 'cart-delete', ['id' => $cart->rowId] ) }}" class="button">Xóa</a>
				      </td>
				    </tr>
				    @endforeach
				    @else
				    	<tr><td>{{ 'Không có sản phẩm trong giỏ hàng' }}</td></tr>
				    @endif
				  </tbody>
				 

				</table>
			</div>
			<div class="col-3">
				<p class="total">Tổng tiền: <span>{{ Cart::total() }} <sup>đ</sup></span></p>
				<a href="{{ route( 'cart-destroy' ) }}" class="btn btn-outline-secondary btn-block no-radius">Xóa giỏ hàng</a>
				<a href="{{ route( 'pay' ) }}" class="btn btn-danger btn-block no-radius">THANH TOÁN</a>
				<a href="" class="next-buy">Tiếp tục mua hàng <i class="fa fa-caret-right"></i><i class="fa fa-caret-right"></i></a>
			</div>
		</div>
	</div>
</div>
@stop