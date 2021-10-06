@extends('client.template.master')
@section('content')
@if (Session::has('Cart') != null)
<div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <h1>Thanh Toán</h1>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Thanh Toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkout margin-bottom-70px">
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout.store')}}" method="post">
                @csrf
                <div class="col-md-6">
                    <div class="billing margin-bottom-50px">
                        <h3>Billing Details</h3>
                        <div class="info-sec">
                            <div class="your-address">
                                <label for="company-name">Địa chỉ<span class="required">*</span></label>
                                <input type="text" name="diaChi" placeholder="Địa Chỉ" id="your-address">
                            </div>
                            <br>
                            <div class="town-city">
                                <label for="company-name">Ghi chú<span class="required">*</span></label>
                                <input type="text" name="ghiChu" placeholder="Ghi chú" id="town-city">
                            </div>
                            <div class="second-address">
                                <label for="company-name">Tổng Tiền<span class="required">*</span></label>
                                <input type="number" name="tongTien" placeholder="{{ Session::get('Cart')->totalPrice }}" id="second-address">
                            </div>
                        </div>
                        <div class="col-md-6 no-padding-left">
                            <button type="submit" style="border-radius: 1px; background-color:#1a1a1a"
                                class="btn btn-primary btn-lg">Đăng kí</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="billing margin-bottom-50px">
                        <h3>Thông tin người đung</h3>
                        <div class="info-sec">
                            <div class="your-address">
                                <label for="company-name">Tên<span class="required">*</span></label>
                                <input type="text" name="" placeholder="{{ $nguoidung->ten_nd }}" id="your-address">
                            </div>
                            <br>
                            <div class="town-city">
                                <label for="company-name">Địa chỉ<span class="required">*</span></label>
                                <input type="text" name="" placeholder="{{ $nguoidung->diachi_nd }}" id="town-city">
                            </div>
                            <div class="second-address">
                                <label for="company-name">Số Điện thoại<span class="required">*</span></label>
                                <input type="number" name="" placeholder="{{ $nguoidung->sdt_nd }}" id="second-address">
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="cart-totals">
                    <h3>Cart totals</h3>
                    <div class="info-sec">
                        <table>
                            <tbody>
                                @foreach (Session::get('Cart')->products as $item)
                                <tr class="product-info">
                                    <td colspan="3">
                                    <span class="quantity">{{$item['quanty']}}</span>
                                    <span class="product-name">{{ $item['productInfor']->ten_sp}}</span>
                                    <span class="apn-number">{{ $item['productInfor']->gia_sp}}</span>
                                    </td>
                                    <td>{{ $item['productInfor']->gia_sp}}</td>
                                </tr>
                                @endforeach
                                <tr class="order-shipping">
                                    <th colspan="3">Tổng Tiền </th>
                                    <td class="shipping">{{ Session::get('Cart')->totalPrice }}</td>
                                </tr>
                                <tr class="order-shipping">
                                    <th colspan="3">shipping</th>
                                    <td class="shipping">free Shipping</td>
                                </tr>
                                <tr class="order-total">
                                    <th colspan="3">Tổng hóa đơn</th>
                                    <td class="amount"><strong>{{ Session::get('Cart')->totalPrice }}</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <div class="cupon-code margin-top-20px">
                            <input type="submit" name="checkout" value="proceed checkout" class="btn-black calculate">
                        </div> --}}

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="payment">
                    <h3>payment method</h3>
                    <div class="payment-method">
                        <table>
                            <tbody>
                                <tr class="">
                                    <th>
                                        <img src="{{ asset('template-client') }}/img/payment/p1.png" alt="">
                                        <input type="radio" name="payment-method" id="paypal">
                                    </th>
                                    <th>
                                        <img src="{{ asset('template-client') }}/img/payment/p2.png" alt="">
                                        <input type="radio" name="payment-method" id="visa">
                                    </th>
                                    <th>
                                        <img src="{{ asset('template-client') }}/img/payment/p3.png" alt="">
                                        <input type="radio" name="payment-method" id="mastercard">
                                    </th>
                                    <th>
                                        <img src="{{ asset('template-client') }}/img/payment/p4.png" alt="">
                                        <input type="radio" name="payment-method" id="direct-bank">
                                    </th>

                                </tr>
                            </tbody>
                        </table>
                        <span>PayPal</span>
                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed. More information here.</p>

                    </div>
                    <div class="cupon-code text-right margin-top-20px">
                        <input type="submit" name="checkout" value="place an order" class="btn-black calculate">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
