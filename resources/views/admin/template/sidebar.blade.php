<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('template-admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
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
                <a href="{{ route('admin.index') }}" class="d-block">Trang chủ</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('danhmuc.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('loaisanpham.index') }}" class="nav-link" >

                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Loại sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cuahang.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Cửa hàng
                        </p>
                    </a>
                </li>
                @if (Auth::guard('quan_tri')->check())
                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Đăng xuất
                            </p>
                        </a>
                    </li>

                @endif



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
