<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    {{-- <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li> --}}
    <li> <a href="{{ route('user') }}"><i class="icon icon-signal"></i> <span>Quản lý thành viên</span></a> </li>
    <li class="submenu"> <a href="{{ route('product') }}"><i class="icon icon-inbox"></i> <span>Quản lý sản phẩm</span></a>
    <ul>
        <li><a href="{{ route( 'product' ) }}">Danh sách sản phẩm</a></li>
        <li><a href="{{ route( 'attribute' ) }}">Thuộc tính sản phẩm</a></li>
        <li><a href="{{ route( 'cate' ) }}">Danh mục sản phẩm</a></li>
      </ul>
    </li>
    <li><a href="{{ route('gallery') }}"><i class="icon icon-tint"></i> <span>Thư viện ảnh</span></a></li>
    <li><a href="{{ route( 'order' ) }}"><i class="icon icon-pencil"></i> <span>Quản lý đơn hàng</span></a></li>
    <li><a href="{{ route( 'comment' ) }}"><i class="icon icon-pencil"></i> <span>Quản lý bình luận</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->
