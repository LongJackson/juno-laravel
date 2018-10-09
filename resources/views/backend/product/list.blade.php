@extends('backend.layout.blank')
@section('main')
<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Danh sách sản phẩm</h5>
			<h5 class="btn btn-success"><a  style="color: #fff;" href="{{ route('add-product') }}"><i class="fa fa-plus"></i> Thêm sản phẩm</a></h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tên sản Phẩm</th>
						<th>Sản phẩm Con</th>
						<th>Mã sản Phẩm</th>
						<th>Ảnh sản phẩm</th>
						<th>Giá tiền</th>
						<th>Danh Mục</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					@foreach($product as $prod)
					<tr>
						<td>{{ $prod->prod_id }}</td>
						<td>{{ $prod->prod_name }}</td>
						<td>
							@foreach($prod->item as $item)
								<p>
									<a href="{{ route('edit-product', ['id' => $item->prod_id]) }}" class="btn btn-primary">{{ $item->prod_name }}</i>
									</a>
								</p>
							@endforeach
						</td>
						<td>{{ $prod->prod_code }}</td>
						<td><img width="150px" src="{{ asset("/storage/upload/images/".$prod->thumbnail->img_name)}}" alt=""></td>
						<td>{{ $prod->prod_price }}</td>
						<td>{{ $prod->category->cate_name }}</td>
						<td><a href="{{ route('edit-product', ['id' => $prod->prod_id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="{{ route('del-product', ['id' => $prod->prod_id]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
@section('script')

@stop