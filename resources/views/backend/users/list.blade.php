@extends('backend.layout.blank')
@section('main')

<div class="row-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5>Danh sách thành viên</h5>
		</div>
		<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Họ &#38; Tên</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->user_id }}</td>
							<td>{{ $user->user_name }}</td>
							<td>{{ $user->user_email }}</td>
							<td>{{ $user->user_phone }}</td>
							<td><a href="{{ route('edit-user', ['id' => $user->user_id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="{{ route('del-user', ['id' => $user->user_id]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
	</div>
</div>

	@stop