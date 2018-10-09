@extends('backend.layout.blank')
@section('main')
<div class="row-fluid">
	
	<div class="span9">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Chi tiết đơn hàng</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered">
					<thead class="thead-inverse">
						<tr>
							<th>Mã đơn hàng</th>
							<th>Tên khách hàng</th>
							<th>Địa chỉ</th>
							<th>Email</th>
							<th>Số điện thoại</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>JUNO {{ $order->order_id }}</td>
							<td>{{ $order->order_name }}</td>
							<td>{{ $order->order_address }}</td>
							<td>{{ $order->order_email }}</td>
							<td>{{ $order->order_phone }}</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered">
					<thead class="thead-inverse">
						<tr>
							<th>Hình ảnh</th>
							<th>Thông tin</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Thành tiền</th>
						</tr>
					</thead>

					<tbody>
						@foreach($order->products as $product)
						@php $options =  unserialize($product->pivot->options); $total += $product->pivot->price * $product->pivot->qty @endphp
						<tr>

							<td><img width="80" src="{{ asset("/lib/public/storage/upload/images/".$options['thumnail'])}}" alt=""></td>
							<td>
								<p class="name"><b>{{ $product->prod_name }}</b></p>

								@if(isset($options['color']))<p>Màu: {{ $options['color'] }}</p>@endif
								@if(isset($options['size']))<p>Size: {{ $options['size'] }}</p>@endif

							</td>
							<td><span>{{ $product->pivot->qty }}</span></td>
							<td>
								<p>{{ $product->pivot->price }} <sup>đ</sup></p>
							</td>
							<td>
								<p>{{ ($product->pivot->price * $product->pivot->qty) }} <sup>đ</sup></p>
							</td>

						</tr>
						@endforeach
						<tr><td colspan="2">Tổng cộng: </td> <td colspan="3">{{ $total }} <sup>đ</sup></td></tr>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	<div class="span3">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Thay đổi trạng thái</h5>
			</div>
			<div class="widget-content nopadding">
				<form action="" method="post" class="form-horizontal">
					<div class="control-group">
						<div class="controls" style="margin: 15px">
							<select name="status" id="">
								<option @if($order->order_status == 0) selected @endif value="0">Chưa kiểm tra</option>
								<option @if($order->order_status == 1) selected @endif value="1">Đang vận chuyển</option>
								<option @if($order->order_status == 2) selected @endif value="2">Giao hàng thành công</option>
								<option @if($order->order_status == 3) selected @endif value="3">Giao hàng thất bại</option>
							</select>
						</div>
					</div>
					{{ csrf_field() }}
					<div class="form-actions">
		              <button type="submit" class="btn btn-primary">Cập nhật</button>
		            </div>
				</form>
			</div>
		</div>
	</div>

</div>
@stop