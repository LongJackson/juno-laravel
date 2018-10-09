@extends('backend.layout.blank')
@section('main')
	<div class="row-fluid">
	<div class="span9">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Cập nhật thành viên</h5>
			</div>
			<div class="widget-content nopadding">
					<form action="" class="form-horizontal">
							<div class="control-group">
								<div class="controls">
								<span class="input-group-addon"><i class="fa fa-user-o"></i></span>
								<input class="form-control input-lg" value="{{ $user->user_name }}" placeholder="Họ &#38; Tên" type="text">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
								<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
								<input class="form-control input-lg" value="{{ $user->user_email }}" placeholder="Email" type="email">
							</div>
						</div>
							<div class="control-group">
								<div class="controls">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input class="form-control input-lg" value="{{ $user->user_phone }}" placeholder="Số điện thoại" type="number">
							</div>
						</div>
						 <div class="form-actions">
						<button type="submit" class="btn btn-success">Cập nhật</button>
					</div>
							{{ csrf_field() }}
						</div>
					</form>
				</div>
			</div>
		</div>
@stop