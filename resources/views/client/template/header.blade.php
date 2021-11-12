<style>
    .fa{
        font-size: 15px;
    }
    .header-navbar {
        color: white;
        margin: auto 5px;
    }
    .product-info i{
      margin: auto 4px;
  }
  .fa-circle{
      font-size: 5px;
      margin-right: 4px;
  }
</style>

{{-- <?php Carbon::setLocale('vi');?> --}}
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="left">Chào mừng bạn<span><i class="fa fa-phone"></i></span>
                       </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="right">
                        <ul>
                            @if (Auth::guard('nguoi_dung')->check())
                                <li><a class="header-navbar" href="{{ route('client.index') }}"><i class="fa fa-home"></i>Trang chủ</a></li>
                                <li><a class="header-navbar" href="{{ route('nguoidung.login') }}"><i class="fa fa-comments"></i>Chat</a></li>
                                <li><a class="header-navbar" >Xin chào {{ Auth::guard('nguoi_dung')->user()->ten_nd }}</a></li>
                                {{-- <span style="font-size: 20px"><i class="far fa-user-circle"></i></span> --}}

                            @else
                                <li><a class="header-navbar" href="{{ route('client.index') }}"><i class="fa fa-home"></i>Trang chủ</a></li>
                                <li><a class="header-navbar" href="{{ route('nguoidung.login') }}"><i class="fa fa-comments"></i>Chat</a></li>
                                <li><a class="header-navbar" href="{{ route('nguoidung.login') }}">Đăng nhập</a></li>
                                <li><a class="header-navbar" href="{{ route('nguoidung.login') }}">Đăng ký</a></li>
                            @endif
                            @if (Auth::guard('nguoi_dung')->check() )
                            <li class="toggle">
                                <span><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>Thêm</span>
                                <ul>
                                    <li><a href="{{ route('quanlycuahang.index') }}">Quản lý bán hàng</a></li>
                                    <li><a href="{{ route('profile.edit', ['id' => Auth::guard('nguoi_dung')->user()->id]) }}">Thông
                                            tin cá nhân</a></li>
                                    <li><a href="{{ route('nguoidung.logout') }}">Đăng xuất</a></li>
                                </ul>
                            </li>
                            @endif
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
                    <form action="{{ route('search.index') }}" method="get">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" />
                        <button type="submit"><span class="arrow_right"></span></button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                    <img src="{{asset('template-client')}}/img/logo.png" alt="Trendify logo" />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 cart-icon">
                    <div class="cart">
                        <a href="#">
                            <img alt="cart" src="{{ asset('template-client') }}/img/cart.png">
                            @if(Cart::content()!= null)
                            <span id="show-total">{{Cart::count() }}</span>
                            @else
                            <span id="show-total">0</span>
                            @endif
                        </a>

                        <div class="cart-list hidden-xs">
                            <div class="change-item-cart">
                                @if (Cart::content()!=null)
                                    <h5 class="title">Số lượng sản
                                        phẩm<span>({{Cart::count() }} sản phẩm)</span></h5>
                                    @foreach (Cart::content() as $item)
                                        <div class="cart-item">
                                            <img class="img-responsive" alt="Single product"
                                                src="{{ asset($item->options['duongdan_ha'])}}">
                                           <span ><a href="{{ route('Delete.cart', ['rowId'=>$item->rowId]) }}"class="icon_close close-icon"
                                            data-id="{{ $item->rowId }}"></a></span>
                                            <div class="product-info">
                                                <h5>{{$item->ten}}</h5>
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
                                                    <del>500000.Đ </del>{{ $item->price }} X
                                                    {{ $item->qty }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                     <div class="order-total">
                                        <h5 class="title">Tổng tiền <span
                                                class="amount">{{  Cart::subtotal() }}</span>
                                        </h5>
                                    </div>
                                @endif


                            </div>
                            <a href="{{ route('cart.list') }}" class="trendify-btn black-bordered">Xem giỏ hàng</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
