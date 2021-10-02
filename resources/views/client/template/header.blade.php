<div class="header">
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
                                @if (Auth::guard('nguoi_dung')->check())
                                    <span style="font-size: 20px"><i class="far fa-user-circle"></i></span>
                                    <span><i class="fa fa-angle-down"></i></span>
                                @else
                            <li><a href="{{ route('nguoidung.login') }}">Đăng nhập</a></li>
                            @endif
                            <ul>
                                @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->id_q == 2)
                                    <li><a href="{{ route('register.store') }}">Đăng kí cửa hàng</a></li>
                                    <li><a
                                            href="{{ route('profile.edit', ['id' => Auth::guard('nguoi_dung')->user()->id]) }}">Thông
                                            tin cá nhân</a></li>
                                    <li><a href="{{ route('nguoidung.logout') }}">Đăng xuất</a></li>

                                @elseif(Auth::guard('nguoi_dung')->check() &&
                                    Auth::guard('nguoi_dung')->user()->id_q == 3 )
                                    <li><a href="{{ route('quanlycuahang.index') }}">Quản lý cửa hàng</a></li>
                                    <li><a
                                            href="{{ route('profile.edit', ['id' => Auth::guard('nguoi_dung')->user()->id]) }}">Thông
                                            tin cá nhân</a></li>
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

    <div class="logo-part">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 search">
                    <form>
                        <input type="text" name="search" placeholder="Search for something" />
                        <button type="submit"><span class="arrow_right"></span></button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                    <img src="{{ asset('template-client') }}/img/logo.png" alt="Trendify logo" />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 cart-icon">
                    <div class="cart">
                        <a href="#">
                            <img alt="cart" src="{{ asset('template-client') }}/img/cart.png">
                            @if(Session::has('Cart')!= null)
                            <span id="show-total">{{ Session::get('Cart')->totalQuanty }}</span>
                            @else
                            <span id="show-total">0</span>
                            @endif
                        </a>

                        <div class="cart-list hidden-xs">
                            <div class="change-item-cart">
                                @if (Session::has('Cart') != null)
                                    <h5 class="title">Số lượng sản
                                        phẩm<span>({{ Session::get('Cart')->totalQuanty }} sản phẩm)</span></h5>
                                    @foreach (Session::get('Cart')->products as $item)
                                        <div class="cart-item">
                                            <img class="img-responsive" alt="Single product"
                                                src="{{ asset($item['productInfor']->hinhanh_sp) }}">
                                            <span class="icon_close close-icon"
                                                data-id="{{ $item['productInfor']->id }}"></span>
                                            <div class="product-info">
                                                <h5>{{ $item['productInfor']->ten_sp }}</h5>
                                                <div class="star-rating">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star-half-full"></i></li>
                                                    </ul>
                                                </div><br>
                                                <div class="price">
                                                    <del>500000.Đ </del>{{ $item['productInfor']->gia_sp }} X
                                                    {{ $item['quanty'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="order-total">
                                        <h5 class="title">Tổng tiền <span
                                                class="amount">{{ Session::get('Cart')->totalPrice }}</span>
                                        </h5>
                                    </div>
                                @endif


                            </div>
                            <a href="{{ route('cart.list') }}" class="trendify-btn black-bordered">View Cart</a>
                            <a href="#" class="trendify-btn black-bordered">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar trendify-nav megamenu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php $danhmuc = DB::table('danh_muc')->get(); ?>
                    @foreach ($danhmuc as $item)
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">{{ $item->ten_dm }}</a>
                            <?php $loaisanpham = DB::table('loai_san_pham')
                                ->where('id_dm', $item->id)
                                ->get(); ?>
                            <ul class="dropdown-menu">
                                @foreach ($loaisanpham as $item)
                                    <li><a
                                            href="{{ route('hienthisp.index', ['id' => $item->id]) }}">{{ $item->ten_lsp }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container-fluid -->
    </div>

</div>
