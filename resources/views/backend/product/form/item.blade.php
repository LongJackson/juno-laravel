
	<form method="post" action="" class="form-horizontal">
		<div class="span8">
			<div class="widget-box">
				<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
					<h5>Thông tin sản phẩm</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="control-group">
						<label class="control-label">Tên sản phẩm :</label>
						<div class="controls">
							<input type="text" name="prod_name" class="span11" value="{{ $product->prod_name }}"placeholder="Tên sản phẩm">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Mã sản phẩm :</label>
						<div class="controls">
							<input type="text" name="prod_code" class="span11" value="{{ $product->prod_code }}" placeholder="Mã sản phẩm">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá sản phẩm :</label>
						<div class="controls">
							<input type="text" name="prod_price" class="span11" value="{{ $product->prod_price }}"placeholder="Giá sản phẩm">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá khuyến mãi :</label>
						<div class="controls">
							<input type="text" class="span11" name="prod_sale_price" value="{{ $product->prod_sale_price }}"placeholder="Giá khuyễn mãi">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Trạng thái :</label>
						<div class="controls">
			                <select name="prod_status" >
			                  <option @if($product->prod_status == 'public') selected @endif value="public">Còn hàng</option>
			                  <option @if($product->prod_status == 'draff') selected @endif value="draff">Hết hàng</option>
			                </select>
			              </div>
					</div>
					<div class="control-group">
						<label class="control-label">Loại sản phẩm :</label>
						<div class="controls">
			                <select  name="prod_type" >
			                  <option @if ($product->prod_type == 'item-group') selected @endif value="item-group">Sản phẩm con</option>
			                </select>
			              </div>
					</div>
					{{ csrf_field() }}
					<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Cập nhật">
					</div>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="widget-box">
				<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
					<h5>Ảnh đại diện</h5>
				</div>
				<div class="widget-content nopadding">
					<div class="control-group" style="padding: 15px;">
						<div class="img">
					
							<img src="{{ asset("/storage/upload/images/".$product->thumbnail->img_name)}}" alt="">
							
						</div>
						<a href="" rel="thumbnail">Thay đổi ảnh đại diện</a>
						<input type="hidden" name="prod_thumbnail" value="{{ $product->prod_thumbnail }}">
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
							@foreach($product->gallery as $gallery)
								<img style="width: 50px; height: 50px" src="{{ asset("/storage/upload/images/".$gallery->img_name)}}" alt="">
								<input   type="hidden" name="img_gallery[]" value="{{ $gallery->img_id }}">
							@endforeach
						</div>
						<a rel="gallery" href="">Chọn ảnh</a>
					</div>
				</div>
			</div>
		</div>
	</form>