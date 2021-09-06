<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="left"> Welcome to Trendify <span><i class="fa fa-phone"></i>Call us</span>
                    +49 1234 5678 9</div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="right">
                    <ul>
                        <li class="toggle">
                            @if(Auth::guard('nguoi_dung')->check())
                            <span style="font-size: 20px"><i class="far fa-user-circle"></i></span>
                            <span><i class="fa fa-angle-down"></i></span>
                            @else
                            <li><a href="{{ route('nguoidung.login') }}">Đăng nhập</a></li>
                            @endif
                            <ul>
                                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->id_q == 2)
                                    <li><a href="{{ route('register.store') }}">Đăng kí cửa hàng</a></li>
                                    {{-- <li><a href="{{ route('profile.edit', ['id'=> Auth::guard('nguoi_dung')->user()->id]) }}">Thông tin cá nhân</a></li> --}}
                                    <li><a href="{{ route('nguoidung.logout') }}">Đăng xuất</a></li>

                                @elseif(Auth::guard('nguoi_dung')->check() &&
                                    Auth::guard('nguoi_dung')->user()->id_q == 3 )
                                    <li><a href="{{ route('quanlycuahang.index') }}">Quản lý cửa hàng</a></li>
                                    {{-- <li><a href="{{ route('profile.edit') }}">Thông tin cá nhân</a></li> --}}
                                    <li><a href="{{ route('nguoidung.logout') }}">Đăng xuất</a></li>

                                @endif

                            </ul>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
