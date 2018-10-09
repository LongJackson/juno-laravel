@extends('backend.layout.blank')
@section('main')
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
          <h5>Cập nhật bình luận </h5>
        </div>
        <div class="widget-content nopadding">
        	<form action="" method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Nội dung bình luận</label>
				<div class="controls">
					<textarea name="content" style="width: 500px;" id="" cols="50" rows="10">{{ $comment->comment_content }}</textarea>

				</div>
			</div>
			<div class="control-group">
			<label class="control-label" for="">Trạng thái</label>
			<div class="controls">
				<select name="status" id="">
					<option @if($comment->comment_status == 0) selected @endif value="0"> Chưa được duyệt </option>
					<option @if($comment->comment_status == 1) selected @endif value="1"> Duyệt bình luận </option>
				</select>
			</div>
			</div>
			<div class="control-group">
			{{ csrf_field() }}
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Cập nhật</button>
				
			</div>
		</form>
        </div>
    </div>
</div>
</div>
</div>
@stop