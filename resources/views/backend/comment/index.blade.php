@extends('backend.layout.blank')
@section('main')
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
          <h5>Danh sách bình luận </h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th>Họ tên</th>
                <th>Nội dung</th>   
                <th width="30%">Hành động</th>
              </tr>
            </thead>
            <tbody style="color: #fff">
              @foreach($comments as $comment)
              <tr class="@switch($comment->comment_status) @case(0) {{ 'bg-primary' }}  @break @case(1) {{ 'bg-success' }}  @break @endswitch">
                <td>{{ $comment->comment_id }}</td>
                <td>{{ $comment->comment_name }}</td>
                <td>{{ $comment->comment_content }}</td>
                <td>
                	<a rel="edit" href="{{ route('edit-comment', ['id' => $comment->comment_id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="{{ route('del-comment', ['id' => $comment->comment_id]) }}" rel="del" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop