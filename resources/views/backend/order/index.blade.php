@extends('backend.layout.blank')
@section('main')
	<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Danh sách Đơn hàng</h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<thead>
					<tr>
						<th>Mã đơn hàng</th>
						<th>Họ Tên</th>
						<th>Email</th>
						<th>Số điện thoại</th>
						<th>Địa Chỉ</th>
						<th>Ngày đặt hàng</th>
						<th>Hành Động</th>
					</tr>
				</thead>
				<tbody style="color: #fff">
					@foreach($orders as $order)
					<tr class="@switch($order->order_status) @case(1) {{ 'bg-warning' }}  @break @case(3) {{ 'bg-danger' }}  @break @case(2) {{ 'bg-success' }} @default {{ 'bg-primary' }} @endswitch">
						<td>JUNO {{ $order->order_id }}</td>
						<td>{{ $order->order_name }}</td>
						<td>{{ $order->order_email }}</td>
						<td>{{ $order->order_phone }}</td>
						<td>{{ $order->order_address }}</td>
						<td>{{ $order->created_at }}</td>
						<td><a href="{{ route('edit-order', ['id' => $order->order_id]) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="{{ route('del-order', ['id' => $order->order_id]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop