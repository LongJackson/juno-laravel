<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
		<h5>Thêm mới danh mục </h5>
	</div>
	<div class="widget-content nopadding">
		<form action="{{ route('create-cate') }}" method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Tên danh mục :</label>
				<div class="controls">
					<input type="text" name="cate_name" class="span11" value=""placeholder="Tên danh mục">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="">Danh mục cha</label>
				<div class="controls">
					<select name="cate_parent" id="">
						<option value="0">-----</option>
						@foreach($category as $cate)
						<option value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="control-group">
		<label class="control-label" for="">Ảnh danh mục</label>
		<div class="controls">
			<div class="data-img">
			
			</div>
			<a href="" rel="doianh" class="">Thay ảnh</a>
		</div>
	</div>
			{{ csrf_field() }}
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Thêm mới</button>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		var thumbnail, url = '{{ asset("/lib/public/storage/upload/images/")}}';
		$('[rel="doianh"]').click(function(e){
			e.preventDefault();
			if (thumbnail) {

				thumbnail.open();
				return
			}
			thumbnail = new Media({
				url: '{{ route('image') }}',
				type: 'thumbnail'
			},
			{
			init: function(data){
				if (data.length) {
					
					$('.data-img').html('<img src="' + url + '/' +data[0].img_name + '"><input type="hidden" name="image" value="'+ data[0].img_id +'">');
				}
			}
			});
		});
	});
</script>