<div class="widget-box">
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
	<h5>Danh sách danh mục </h5>
</div>
<div class="widget-content nopadding">
	<table class="table table-bordered data-table">
		<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="60%">Tên danh mục</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			{!! Menu::menutable($category) !!}
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
			}).fail(function(data){
				console.log(data)
			});
		});

		$('[rel="del"]').click(function(){
			if (confirm('Bạn chắc chắn muốn xóa danh mục này')){

			}
			else {
				return false;
			}
		});

	});
</script>