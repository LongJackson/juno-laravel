<tr>
    <td>{{ $cate->cate_id }}</td>
    <td>{{ $char.$cate->cate_name }}</td>
    <td><a rel="edit" href="{{ route('edit-cate', ['id' => $cate->cate_id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="{{ route('del-cate', ['id' => $cate->cate_id]) }}" rel="del" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>