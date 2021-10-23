@extends('client.template.master')
@section('content')
    {{-- {{ dd(Session::get('id_nb')) }} --}}
    {{-- {{ dd(Session::get('coupon')) }} --}}
    {{-- @foreach (Session::get('coupon') as $item => $coup)
        {{ dd($coup['coupon_condition']) }}
    @endforeach --}}
    <style>
        .image-product img {
            width: 170px;
            height: 170px;
        }

        .content-product {
            margin-left: 20px;
        }

        /* .product-cart{
                                        border-top: 1px solid #333;
                                    } */
        .quantity input {
            padding-left: 10px;
            width: 72%;
        }

        .textarea-note {
            margin-top: 10px;
            /* border: 1px solid #0c0b0b; */
        }

        .textarea {
            width: 90%;
            height: 70px;
            font-size: 14px;
            line-height: 18px;
            border: 1px hidden #706b6b;
            padding: 10px;
            border-radius: 6px;
            box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
        }

        .row-container {
            margin-bottom: 20px;
            border: 1px solid #333;
            padding-top: 5px;
            padding: 10px;
            border-radius: 6px;
            box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
            box-sizing: border-box;

        }

        .infor {
            display: flex;
        }

        .pttt {
            margin: 10px;
        }

        .payment-method {
            border: 1px hidden #706b6b;
            padding: 10px;
            border-radius: 6px;
            box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
        }

    </style>

    <div class="page_title_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="page_title">
                        <h1>Thanh toán</h1>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="bredcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Cart::content() != null)
        <div class="container">
            @foreach (Cart::content()->groupBy('options.id_nb') as $item => $key)
                <?php
                $totalPrice = 0;
                $quanty = 0;
                $id_nb = Session::get('id_nb');
                ?>
                @if ($item == $id_nb)
                    <div class="row row-container">
                        <form action="{{ route('checkout.store', ['id' => $item]) }}" method="post">
                            @csrf
                            <div class="col-md-7 product-cart">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $tenNguoiDung = DB::table('nguoi_dung')
                                            ->where('id', $item)
                                            ->first();
                                        ?>
                                        Tên người bán : <a href="">{{ $tenNguoiDung->ten_nd }}</a>
                                    </div>
                                </div>
                                @foreach ($key as $value)
                                    <div class="row" id="input-total-price">
                                        <div class="col-md-3">
                                            <div class="image-product">
                                                <a href=""><img src="{{ asset($value->options['duongdan_ha']) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="content-product">
                                                <h4>Black Father Classic T-Shirt New Dad Shirt Dad Shirt Daddy Shirt
                                                    Father's Day Shirt Best Dad shirt Gift for Dad</h4>
                                                <div class="price">
                                                    <del>{{ $value->price + ($value->price * 10) / 100 }}
                                                        VND</del>{{ $value->price }} VND X {{ $value->qty }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quantity">
                                                <input id="quanty" type="number" step="1" min="0" max="99" name="cart"
                                                    value="{{ $value->qty }}" title="Qty" class="qty">
                                            </div>
                                        </div>
                                        <?php
                                        $totalPrice += $value->qty * $value->price;
                                        $quanty += $value->qty;
                                        ?>
                                    </div>
                                @endforeach


                                <input id="total" type="hidden" name="tong_sp" value="{{ $quanty }}">
                                <input id="total" type="hidden" name="id_nb" value="{{ $item }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="textarea-note">
                                            <textarea class="textarea" placeholder="Ghi chú" name="ghiChu"
                                                value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit"
                                            style="border-radius: 1px; background-color:#1a1a1a; margin-top:20px;"
                                            class="btn btn-primary btn-lg checkout">Thanh Toán</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="payment">
                                    <h3>Tổng đơn hàng</h3>
                                    <div class="payment-method">
                                        <table>
                                            <tbody>
                                                <tr class="">
                                                    <th>
                                                        <h4 class="pttt">Thanh toán khi nhận hàng</h4>
                                                        <input type="radio" name="phuongThucThanhToan" id="mastercard"
                                                            value="2">
                                                    </th>
                                                    <th>
                                                        <h4 class="pttt">Thanh toán bằng thẻ ngân hàng</h4>
                                                        <input type="radio" name="phuongThucThanhToan" id="direct-bank"
                                                            value="1">
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Tổng tiền</label>
                                            </div>
                                            <div class="col-md-6 no padding-left">
                                                <p>{{ $totalPrice }} VND</p>
                                            </div>
                                        </div>

                                        {{-- //////////////// --}}
                                        @if (Session::has('coupon'))
                                            @foreach (Session::get('coupon') as $item => $cou)
                                                @if ($cou['coupon_condition'] == 1)
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Mã giảm </label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p> {{ $cou['coupon_number'] }}%</p>
                                                        </div>
                                                    </div>
                                                    <?php $total_coupon = ($totalPrice * $cou['coupon_number']) / 100; ?>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Số tiền giảm</label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ $total_coupon }} VND</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Phí giao hàng</label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ Session::get('fee') }} VND</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Tổng tiền</label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ $totalPrice - $total_coupon + Session::get('fee') }}
                                                                VND</p>
                                                        </div>
                                                    </div>

                                                    @foreach (Session::get('coupon') as $item => $cou)
                                                    <input id="total" type="hidden" name="coupon"
                                                    value="{{ $cou['coupon_code']}}">
                                                    @endforeach

                                                @else
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Mã giảm </label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p> {{ $cou['coupon_number'] }} VND</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Phí giao hàng</label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ Session::get('fee') }} VND</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Tổng tiền</label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ $totalPrice - $cou['coupon_number'] + Session::get('fee') }}
                                                                VND</p>
                                                        </div>
                                                    </div>

                                                    @foreach (Session::get('coupon') as $item => $cou)
                                                    <input id="total" type="hidden" name="coupon"
                                                    value="{{ $cou['coupon_code']}}">
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                        {{-- //////////// --}}

                                        @if (!Session::has('coupon'))
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Phí giao hàng</label>
                                                </div>
                                                <div class="col-md-6 no padding-left">
                                                    <p>{{ Session::get('fee') }} VND</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Tổng hóa đơn</label>
                                                </div>
                                                <div class="col-md-6 no padding-left">
                                                    <p>{{ $totalPrice + Session::get('fee') }}</p>
                                                </div>
                                            </div>

                                            <input id="total" type="hidden" name="coupon" value="">
                                        @endif
                                        <input id="total" type="hidden" name="tong_tien"
                                        value="{{ $totalPrice}}">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-5">
                            <div class="payment">
                                <h3>Thông tin vận chuyển</h3>
                                <div class="payment-method">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Họ tên </label>
                                        </div>
                                        <div class="col-md-6 no padding-left">
                                            <p>{{ $ttvc->ten_ttvc }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Địa chỉ</label>
                                        </div>
                                        <div class="col-md-9 no padding-left">
                                            <p>{{ $ttvc->diachi_ttvc }},{{ $ttvc->name_tp }},{{ $ttvc->name_qh }},{{ $ttvc->name_xa }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Số điện thoại</label>
                                        </div>
                                        <div class="col-md-6 no padding-left">
                                            <p>{{ $ttvc->sdt_ttvc }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Email</label>
                                        </div>
                                        <div class="col-md-6 no padding-left">
                                            <p>{{ $ttvc->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('check.coupon') }}" method="post">
                            @csrf
                            <div class="col-md-5">
                                <div class="payment">
                                    <h3>Mã giảm giá</h3>
                                    <div class="form-group">
                                        <label for="email">Nhập mã giảm giá:</label>
                                        @if (Session::has('error'))
                                            <p style="color: rgb(231, 22, 22)">{{ Session::get('error') }}</p>
                                        @endif
                                        @if (Session::has('success'))
                                            <p style="color: rgb(29, 209, 12)">{{ Session::get('success') }}</p>
                                        @endif
                                        <input type="text" name="coupon" class="form-control" id="email">
                                    </div>
                                    <button type="submit" class="btn btn-default">Sử dụng</button>
                                    <a href="{{ route('unset.coupon') }}">Xóa tất cả mã khuyến mãi</a>

                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    @endif
    @endforeach
    @endif
@endsection
@push('input-total-price')
        {{-- <script>
           function onclick(){
               alert('ban co muon dat hang')
           }
        </script> --}}
@endpush
{{-- <div class="row">
                        <div class="cupon-code margin-top-20px">
                            <input type="submit" name="checkout" value="place an order" class="btn-black calculate">
                        </div>
                    </div> --}}
