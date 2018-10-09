@extends('backend.layout.blank')
@section('main')
<div class="row-fluid">
	<form method="post" action="" class="form-horizontal">
		<div class="span8">
			<div class="widget-box">
				<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
					<h5>Thêm sản phẩm mới</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="control-group">
						<label class="control-label">Tên sản phẩm :</label>
						<div class="controls">
							<input type="text" name="prod_name" class="span11" value="" placeholder="Tên sản phẩm">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Mã sản phẩm :</label>
						<div class="controls">
							<input type="text" name="prod_code" class="span11" value="" placeholder="Mã sản phẩm">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá sản phẩm :</label>
						<div class="controls">
							<input type="text" name="prod_price" class="span11" value=""placeholder="Giá sản phẩm">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá khuyến mãi :</label>
						<div class="controls">
							<input type="text" class="span11" name="prod_sale_price" value=""placeholder="Giá khuyễn mãi">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"  for="">Danh mục sản phẩm</label>
						<div class="controls">
							<select name="prod_cate" id="">
								@foreach($cates as $cate)
									<option value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Trạng thái :</label>
						<div class="controls">
			                <select name="prod_status" >
			                  <option value="public">Còn hàng</option>
			                  <option value="draff">Hết hàng</option>
			                </select>
			              </div>
					</div>
					<div class="control-group">
						<label class="control-label">Loại sản phẩm :</label>
						<div class="controls">
			                <select name="prod_type" >
			                  <option value="single">Đơn</option>
			                  <option value="group">Nhóm</option>
			                </select>
			              </div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Mô tả sản phẩm</label>
						<div class="controls">
						</div>
						<div style="clear: both"></div>
						<textarea id="description" name="prod_des" class="form-control"></textarea>
					</div>
					{{ csrf_field() }}
					<div class="form-actions">
					<input type="submit" class="btn btn-success" value="Thêm mới">
					</div>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="widget-box">
				<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
					<h5>Thuộc tính sản phẩm</h5>
				</div>
				<div class="widget-content nopadding">
					@foreach($attribute as $att)
					<div class="control-group">
						<label class="control-label"  for="">{{ $att->att_name }} </label>
						<div class="controls" style="margin-left: 15px">
							<select multiple name="prod_attr[]">
								@foreach($att->value as $key => $val)
								<option  value="{{ $val->att_value_id }}"> {{ $val->att_value }} </option>
								</label>
								@endforeach
							</select>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="widget-box">
				<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
					<h5>Ảnh đại diện</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="control-group" style="padding: 15px;">
						<div class="img">
					
							<img src="" alt="">
							
						</div>
						<a href="" rel="thumbnail">Thay đổi ảnh đại diện</a>
						<input type="hidden" name="prod_thumbnail" value="">
					</div>
				</div>
			</div>
			<div class="widget-box">
				<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
					<h5>Thư viện ảnh</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="control-group" style="padding: 15px;">
						<div class="gallery">
						</div>
						<a rel="gallery" href="">Chọn ảnh</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@stop
@section('footer')
<script src="ckeditor/ckeditor.js"></script>
<script>
	 CKEDITOR.replace( 'description' );
	$(document).ready(function(){
		var thumbnail, gallery, url = '{{ asset("/storage/upload/images/")}}';
		$('select').select2();
			
		$('[rel="thumbnail"]').click(function(e){
			e.preventDefault();
			if (thumbnail) {

				thumbnail.open();
				return
			}
			thumbnail = new Media({
				url: '{{ route('upload') }}'
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
					url: '{{ route('upload') }}',
					multiselect: true
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