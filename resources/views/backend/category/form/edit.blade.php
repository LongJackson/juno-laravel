<div class="widget-box">
	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
		<h5>Cập nhật danh mục</h5>
	</div>
	<div class="widget-content nopadding">
<form action="{{ route('edit-cate', ['id' => $cate->cate_id]) }}" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Tên danh mục :</label>
		<div class="controls">
			<input type="text" name="cate_name" value="{{ $cate->cate_name }}" class="span11" value=""placeholder="Tên danh mục">
		</div>
	</div>
	<div class="control-group">
			<label class="control-label" for="">Danh mục cha</label>
			<div class="controls">
				<select name="cate_parent" id="">
					<option value="0">-----</option>
					@foreach($category as $cates)
						<option @if($cate->cate_parent == $cates->cate_id) {{ 'selected' }} @endif value="{{ $cates->cate_id }}">{{ $cates->cate_name }}</option>
					@endforeach
				</select>
			</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="">Ảnh danh mục</label>
		<div class="controls">
			<div class="data-img">
			@if($cate->image)
				<img src="{{ asset("/lib/public/storage/upload/images/".$cate->image->img_name)}}" alt="">
				<input type="hidden" name="image" value="{{ $cate->image->img_id }}">
			@endif
			</div>
			<a href="" rel="doianh" class="">Thay ảnh</a>
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
		var thumbnail, url = '{{ asset("/lib/public/storage/upload/images/")}}';
		$('[rel="add"]').click(function(){
			$.ajax({
				url: '{{ route('create-cate') }}'
			}).done(function(data){

				$('.form').html(data);

			}).fail(function(data){
				console.log(data)
			});
		});
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