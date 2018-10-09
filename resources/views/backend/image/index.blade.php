@extends('backend.layout.blank')
@section('main')
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
          <h5>Gallery </h5>
          <h5 rel="uploadanh" class="btn btn-success" style="color: #fff;"><i class="fa fa-plus"></i> Thêm ảnh</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th>Tên ảnh</th>
                <th>Định dạng</th>
                <th>Ảnh hiện thị</th>
                <th width="30%">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($images as $image)
              <tr>
                <td>{{ $image->img_id }}</td>
                <td>{{ $image->img_name }}</td>
                <td>{{ $image->img_type }}</td>
                <td><img style="max-width: 100px;" src="{{ asset('/storage/upload/images/'.$image->img_name) }}" alt="" ></td>
                <td><a href="{{ route('del-cate', ['id' =>  $image->img_id]) }}" rel="del" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a><a class="lightbox_trigger btn btn-warning" href="{{ asset('/storage/upload/images/'.$image->img_name) }}"><i class="fa fa-search"></i></a></td>
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
@section('footer')
  <script>
    $(document).ready(function(){
      

      $('[rel="uploadanh"]').click(function(e){
        
        e.preventDefault();

        $.ajax({
          url: '{{ route( 'form-upload' ) }}',

        }).done(function(data){
          $('#myModal').modal().html(data);
        });

      });

    });
  </script>
@stop


