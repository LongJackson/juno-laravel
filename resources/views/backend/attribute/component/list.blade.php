<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
	<h5>Danh sách danh mục </h5>
</div>
<div class="widget-content nopadding">
	<table class="table table-bordered data-table">
		<thead>
			<tr>
				<th width="10%">ID</th>
				<th>Tên thuộc tính</th>
				<th>Giá trị</th>
				<th width="30%">Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($attribute as $attr)
			<tr>
				<td>{{ $attr->att_id }}</td>
				<td>{{ $attr->att_name }}</td>
				<td>
					@foreach($attr->value as $value)
						<span class="badge badge-info"> {{ $value->att_value }} <a  href="{{ route('del-value', ['id' => $value->att_value_id]) }}" class="tip-top" data-original-title="Xóa" rel="del"><i class="fa fa-remove"></i></a> </span>
					@endforeach
				</td>
				<td><a rel="edit" href="{{ route('edit-attr', ['id' => $attr->att_id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="{{ route('del-attr', ['id' => $attr->att_id]) }}" rel="del" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>

<script>
	$(document).ready(function(){
		$('[rel="edit"]').click(function(e){
			e.preventDefault();
			var that = $(this);
			$.ajax({
				url: that.attr('href')
			}).done(function(data){
				$('.form').html(data);
			});
		});

		$('[rel="del"]').click(function(){
			if (!confirm('Bạn chắc chắn muốn xóa !!!')){
				return false;
			}
			
		});

	});
</script>