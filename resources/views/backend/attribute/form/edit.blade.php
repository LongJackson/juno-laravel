<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
		<h5>Thêm mới thuộc tính </h5>
	</div>
	<div class="widget-content nopadding">
		<form action="{{ route('edit-attr', ['id' => $attribute->att_id]) }}" method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Tên thuộc tính :</label>
				<div class="controls">
					<input type="text" name="att_name" class="span11" value="{{ $attribute->att_name }}" placeholder="Tên thuộc tính">
				</div>
			</div>
			<div class="control-group">
			<label class="control-label" for="">Giá trị</label>
			<div class="controls">
				@foreach($attribute->value as $val)
					<input type="text" name="att_value[{{ $val->att_value_id }}]" value="{{ $val->att_value }}">
				@endforeach
			</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="">Giá trị mới</label>
				<div class="controls">
					<textarea name="att_value_new" id=""  rows="5"></textarea>
				</div>
			</div>
			{{ csrf_field() }}
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Cập nhật</button>
				<button rel="add" type="button" class="btn btn-success"><i class="fa fa-plus"></i>Thêm mới</button>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('[rel="add"]').click(function(){
			$.ajax({
				url: '{{ route('create-attr') }}'
			}).done(function(data){

				$('.form').html(data);

			}).fail(function(data){
				console.log(data)
			});
		});
	});
</script>