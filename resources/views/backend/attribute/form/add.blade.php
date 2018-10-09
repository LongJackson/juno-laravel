<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
		<h5>Thêm mới thuộc tính </h5>
	</div>
	<div class="widget-content nopadding">
		<form action="{{ route('create-attr') }}" method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Tên thuộc tính :</label>
				<div class="controls">
					<input type="text" name="att_name" class="span11" value=""placeholder="Tên thuộc tính">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="">Giá trị</label>
				<div class="controls">
					<textarea name="att_value" id=""  rows="5"></textarea>
				</div>
			</div>
			{{ csrf_field() }}
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Thêm mới</button>
			</div>
		</form>
	</div>
</div>