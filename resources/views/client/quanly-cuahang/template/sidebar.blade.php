{
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('template-admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
      <?php $id_nd = Auth::guard('nguoi_dung')->user()->id;
      ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('template-admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <p style="color: rgb(231, 224, 224)">Xin chao {{ Auth::guard('nguoi_dung')->user()->ten_nd }}</p>
            <a style="margin-top:2px;" href="{{ route('nguoidung.logout') }}">Đăng xuất</a>
        </div>
    </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview">
            <a href="{{route('order.index')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Đơn hàng đã đặt
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý sản phẩm
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sanpham.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sản phẩm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('product_report.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sản phẩm vi phạm</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('manage_oder.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý đơn hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('baiviet.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý bài viết
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('thongtinlienhe.index')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý thông tin liên hệ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('phivanchuyen.index') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý phí vận chuyển
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Thống kê
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage_chars_oder.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê danh thu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('manage_chars_product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê tổng đơn hàng và sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
