<div class="row-fluid">
	<div class="modal-header">
		<ul class="nav nav-tabs">
			<li><a data-toggle="tab" href="#upload">Upload</a></li>
			<li class="active"><a data-toggle="tab" href="#tab2">Chọn hình ảnh</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div id="upload" class="tab-pane">
			@include('backend.image.form.upload')
		</div>
		<div id="tab2" class="tab-pane active">
			<div class="modal-body">
				<div class="span12 media">
					@include('backend.image.component.gallery')
				</div>
			</div>
			<div class="modal-footer"> <a data-dismiss="modal" rel="confirm" class="btn btn-primary" href="#">Xác nhận</a> <a data-dismiss="modal" class="btn" href="#">Hủy</a>
			</div>
		</div>
	</div>         
</div>

