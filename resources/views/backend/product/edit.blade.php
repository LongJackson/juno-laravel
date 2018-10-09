@extends('backend.layout.blank')
@section('main')
<div class="row-fluid">
	@if($product->prod_type == 'item-group')
		@include('backend.product.form.item')
	@else
		@include('backend.product.form.parent')
	@endif
</div>

@stop
@section('footer')
<script src="ckeditor/ckeditor.js"></script>
<script>
	 
	$(document).ready(function(){
		if ($('#description').length) {
	 
		CKEDITOR.replace( 'description' )
		}
		var id = {{ $product->prod_id }}, thumbnail, gallery, url = '{{ asset("/storage/upload/images/")}}';
		$('select').select2();
			
		$('[rel="thumbnail"]').click(function(e){
			e.preventDefault();
			if (thumbnail) {

				thumbnail.open();
				return
			}
			thumbnail = new Media({
				url: '{{ route('image') }}',
				type: 'thumbnail',
				id: id
			},
			{
			init: function(data){
				if (data.length) {
					$('.img').find('img').attr('src', url + '/' + data[0].img_name);
					$('[rel="thumbnail"]').text('Đổi ảnh đại diện');
					$('[name="prod_thumbnail"]').val(data[0].img_id);
				}
			}
			});
		});
			$('[rel="gallery"]').click(function(e){
				e.preventDefault();

				if (gallery) {
					gallery.open();
					return
				}
				gallery = new Media({
					url: '{{ route('image') }}',
					multiselect: true,
					type: 'gallery',
					id: id
				},{
					init: function(data){
						$('.gallery').empty();
						$.each(data, function(index, val) {
							$('.gallery').append('<img style="height: 50px; width: 50px;" src="' + url+ '/' +val.img_name+'">');
							$('.gallery').append('<input type ="hidden" name="img_gallery[]" value="' + val.img_id + '">');
						});
					}
				});
			});
		});

</script>
@stop