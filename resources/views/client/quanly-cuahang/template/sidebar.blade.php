<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('client.index') }}" class="brand-link">
        <img src="{{ asset('template-client') }}/img/logo.png" alt="Trendify logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">
            <?php $id_nd = Auth::guard('nguoi_dung')->user()->id;
                   ?>
            </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: rgb(53, 53, 53)">
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Đơn hàng đã đặt
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sanpham.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_oder.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('baiviet.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý bài viết
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('thongtinlienhe.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý thông tin liên hệ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('phivanchuyen.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý phí vận chuyển
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('nguoidung.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li> --}}




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
