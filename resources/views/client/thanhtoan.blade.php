@extends('client.template.master')
@section('content')

    {{-- {{ dd(Session::get('total_price')) }} --}}
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
            width: 100%;
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
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            {{-- <li><a href="#">Cart</a></li> --}}
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


                                <input id="quanty" type="hidden" name="tong_sp" value="{{ $quanty }}">
                                <input id="id_nb" type="hidden" name="id_nb" value="{{ $item }}">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="textarea-note">
                                            <textarea class="textarea ghiChu" placeholder="Ghi chú" name="ghiChu"
                                                value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="payment-method">
                                            <h3>Mã giảm giá</h3>
                                            <div class="form-group">
                                                <label for="email">Nhập mã giảm giá:</label>
                                                    {{-- @if (Session::has('error'))
                                                        <p style="color: rgb(231, 22, 22)">{{ Session::get('error') }}</p>
                                                    @endif
                                                    @if (Session::has('success'))
                                                        <p style="color: rgb(29, 209, 12)">{{ Session::get('success') }}</p>
                                                    @endif --}}
                                                <input type="text" name="coupon" class="form-control coupon" id="email">

                                            </div>
                                            <div class="col-md_12">
                                                <div class="row" style="margin-left:5px">
                                                    <button type="submit" class="btn btn-default check-coupon">Sử dụng</button>
                                                    <button type="submit" class="btn btn-default unset-coupon">Hủy mã giảm giá</button>
                                                </div>
                                            </div>

                                                {{-- <a href="{{ route('unset.coupon') }}">Xóa tất cả mã khuyến mãi</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit"
                                            style="border-radius: 1px; background-color:#1a1a1a; margin-top:20px;"
                                            class="btn btn-primary btn-lg checkout">Đặt hàng</button>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <a style="margin:20px 0px 0px 0px" href="{{ route('thanhtoan.index',['id'=> $item ]) }}" class="trendify-btn black-bordered checkout">Thanh toán</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="payment">
                                    <h3>Thông tin vận chuyển</h3>
                                    <div class="payment-method">
                                        <div class="form-group">
                                            <label for="">Tên thành phố</label>
                                            <select name="id_city" id="" class="form-control thanhPho">
                                                <option value="">Chọn thành phố</option>
                                                @foreach ($tp as $item )
                                                    <option value="{{ $item->matp }}">{{ $item->name_tp }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên quận huyện</label>
                                            <select name="id_qh" id="" class="form-control quanHuyen">
                                                <option value="">Chọn quận huyện</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên xã phường</label>
                                            <select name="id_xp" id="" class="form-control xaPhuong">
                                                <option value="">Chọn xã phường</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số nhà</label>
                                            <input name="diaChi" type="text" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số điện thoại</label>
                                            <input name="sdt" type="text" class="form-control" >
                                        </div>
                                          <button type="submit" class="btn btn-default check-feeship">Tính phí vận chuyển</button>
                                    </div>
                                    <h3>Tổng đơn hàng</h3>
                                    <div class="payment-method">
                                        <table>
                                            <tbody>
                                                <tr class="">
                                                    <th>
                                                        <h4 class="pttt">Thanh toán khi nhận hàng</h4>
                                                        <input type="radio"name="phuongThucThanhToan" id="mastercard"
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
                                            <div class="col-md-4">
                                                <label for="">Tổng tiền</label>
                                            </div>
                                            <div class="col-md-6 no padding-left">
                                                <p>{{number_format( $totalPrice )}} VND</p>
                                            </div>
                                        </div>
                                        <input id="total" type="hidden" name="tong_tien" value="{{ $totalPrice }}">
                                        <div class="fee-ship">

                                        </div>



                                        {{-- //////////////// --}}
                                        {{-- @if (Session::has('coupon'))
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
                                                    <
                                                            <label for="">Tổng tiền</label>
                                                        </ddiv class="row">
                                                        <div class="col-md-3">
                                                            <label for="">Phí giao hàng</label>
                                                        </div>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ Session::get('fee') }} VND</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">iv>
                                                        <div class="col-md-6 no padding-left">
                                                            <p>{{ $totalPrice - $total_coupon + Session::get('fee') }}
                                                                VND</p>
                                                        </div>
                                                    </div>

                                                    @foreach (Session::get('coupon') as $item => $cou)
                                                        <input id="total" type="hidden" name="coupon"
                                                            value="{{ $cou['coupon_code'] }}">
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
                                                            value="{{ $cou['coupon_code'] }}">
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif --}}
                                        {{-- //////////// --}}

                                        {{-- @if (!Session::has('coupon'))
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
                                        @endif --}}

                                    </div>

                                </div>
                            </div>
                        </form>
                        {{-- <div class="col-md-5">
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
                        </div> --}}

                    </div>
        </div>
    @endif
    @endforeach
    @endif
@endsection
@push('input-total-price')

<script>
    $(document).ready(function() {
        const BASE_URL = window.location.origin //lấy base url
        $('select.thanhPho').change(function(e) {
            e.preventDefault();
            var getIDCity = $(this).children("option:selected").val();
            $('.itemProvince').remove();
            $.ajax({
                type: "get",
                url: BASE_URL+ "/client/get-province/" + getIDCity,
                dataType: "json",
                success: function(response) {
                    for (let i = 0; i < response.length; i++) {
                        $('.quanHuyen').append('<option value="' + response[i].maqh +
                            '" class="itemProvince" >' + response[i].name_qh + '</option>');

                    }
                }
            });
        });
        $('select.quanHuyen').change(function(e) {
            e.preventDefault();
            var getIDProvince = $(this).children("option:selected").val();
            // console.log(getIDCity);
            // console.log('124')
            $('.itemWards').remove();
            $.ajax({
                type: "get",
                url: BASE_URL+"/client/get-wards/" + getIDProvince,
                dataType: "json",
                success: function(response) {
                    for (let i = 0; i < response.length; i++) {
                        $('.xaPhuong').append('<option value="' + response[i].maxa +
                            '"class="itemWards" >' + response[i].name_xa + '</option>');

                    }

                }
            });
        });
        $('.check-feeship').click(function (e) {
            e.preventDefault();
            var id_city = $('.thanhPho').val();
            var id_qh = $('.quanHuyen').val();
            var id_xp = $('.xaPhuong').val();
            var total_price = $('#total').val();

            $.ajax({
                type: "get",
                url: "/check-feeship",
                data:{
                    id_city: id_city,
                    id_qh:id_qh,
                    id_xp:id_xp,
                    total_price:total_price,
                },
                // dataType: "dataType",
                success: function (data) {
                    $('.fee-ship').html(data);


                }
            });

        });

        $('.check-coupon').click(function (e) {
            e.preventDefault();
            var coupon = $('.coupon').val();
            $.ajax({
                type: "get",
                url: "/check-coupon/",
                data: {
                    coupon:coupon,
                },
                // dataType: "dataType",
                success: function (data) {
                    if(data!="false"){
                        $.alert({
                            title: 'Thông báo!',
                            content: 'Sử dụng mã giảm giá thành công!',
                        });
                        $('.fee-ship').html(data);
                    }else{
                        $.alert({
                            title: 'Thông báo!',
                            content: 'Mã giảm giá không tồn tại!',
                        });
                    }

                }
            });
        });

        $('.unset-coupon').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/unset-coupon",
                // data: "data",
                // dataType: "dataType",
                success: function (data) {
                    $.alert({
                            title: 'Thông báo!',
                            content: 'Hủy mã giảm giá thành công!',
                        });
                    $('.fee-ship').html(data);
                }
            });
        });

    });




</script>

@endpush
{{-- <div class="row">
                        <div class="cupon-code margin-top-20px">
                            <input type="submit" name="checkout" value="place an order" class="btn-black calculate">
                        </div>
                    </div> --}}
