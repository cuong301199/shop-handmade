@extends('client.template.master')
@section('content')
<style>
    .image-product img{
        width: 170px;
        height: 170px;
    }
    .content-product{
        margin-left: 20px;
    }
    /* .product-cart{
        border-top: 1px solid #333;
    } */
    .quantity input {
    padding-left: 10px;
    width: 72%;
    }
    .textarea-note{
        margin-top: 10px;
        /* border: 1px solid #0c0b0b; */
    }
    .textarea{
        width: 90%%;
        height: 70px;
         font-size: 14px;
         line-height: 18px;
         border: 1px hidden #706b6b;
         padding: 10px;
         border-radius: 6px;
         box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
    }
    .row-container{
        margin-bottom: 50px;
        border-top:1px solid #333;
        padding-top: 5px

    }
    .infor  {
        display: flex;
    }
    .pttt{
        margin: 10px;
    }
    .payment-method{
        border: 1px hidden #706b6b;
         padding: 10px;
         border-radius: 6px;
         box-shadow: inset 0px 0px 5px rgb(117, 115, 115);
    }

</style>
@if (Session::has('Cart') != null)
<div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <h1>SHOPPING CART</h1>
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
<div class="container">
    <div class="row">
        {{-- <div class=" infor-user">
            <div class="infor name">
                <label for="">Họ và tên :</label>
                <p>Trần Tiến Cường</p>
            </div>
            <div class="infor email">
                <label for="">Email :</label>
                <p>ttiencuong30@gmail</p>
            </div>
            <div class="infor sdt">
                <label for="">Số Điện Thoại</label>
                <p>083546783</p>
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="billing margin-bottom-50px">
                <h3>Thông tin người dùng</h3>
                <div class="info-sec">
                    <div class="your-address">
                        <label for="company-name">Tên<span class="required"></span></label>
                        <input type="text" name="" placeholder="{{ $nguoidung->ten_nd }}" id="your-address">
                    </div>
                    <div class="town-city">
                        <label for="company-name">Email<span class="required"></span></label>
                        <input type="text" name="" placeholder="{{ $nguoidung->email_nd }}" id="town-city">
                    </div>
                    <div class="second-address">
                        <label for="company-name">Số Điện thoại<span class="required"></span></label>
                        <input type="number" name="" placeholder="{{ $nguoidung->sdt_nd }}" id="second-address">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <form action="{{ route('checkout.store')}}" method="post">
        @csrf
        <div class="row row-container">
            <div class="col-md-7 product-cart">
                <div class="row">
                <div class="col-md-12">
                        Tên của hàng
                </div>
                </div>
                @foreach (Session::get('Cart')->products as $item)
                <div class="row">
                    <div class="col-md-3">
                        <div class="image-product">
                            <a href=""><img src="{{ asset($item['productInfor']->hinhanh_sp) }}" alt=""></a>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-product">
                            <h4>Black Father Classic T-Shirt New Dad Shirt Dad Shirt Daddy Shirt Father's Day Shirt Best Dad shirt Gift for Dad</h4>
                            <div class="price">
                                <del>500000 VND </del>{{ $item['price'] }} VND
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div class="quantity">
                            <input id="quanty" type="number" step="1" min="0" max="99" name="cart"
                                    value="{{ $item['quanty'] }}" title="Qty" class="qty">
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row">
                <div class="col-md-6">
                        <div class="textarea-note">
                            <textarea class="textarea" placeholder="Địa chỉ"
                            name="diaChi" value=""></textarea>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="textarea-note">
                            <textarea class="textarea" placeholder="Ghi chú"
                            name="ghiChu" value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" style="border-radius: 1px; background-color:#1a1a1a;"
                            class="btn btn-primary btn-lg">Thanh Toán</button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="payment">
                    <h3>Phương thức thanh toán</h3>
                    <div class="payment-method">
                        <table>
                            <tbody>
                                <tr class="">
                                    <th>
                                        <h4 class="pttt">Thanh toán khi nhận hàng</h4>
                                        <input type="radio" name="phuongThucThanhToan" id="mastercard" value="thanh toán khi nhận hàng">
                                    </th>
                                    <th>
                                        <h4 class="pttt">Thanh toán bằng thẻ ngân hàng</h4>
                                        <input type="radio" name="phuongThucThanhToan" id="direct-bank" value="thanh toán bằng thẻ ngân hàng">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <span>PayPal</span>
                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed. More information here.</p> --}}
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tổng tiền</label>
                            </div>
                            <div class="col-md-6 no padding-left">
                                <p>1000000</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Phí giao hàng</label>
                            </div>
                            <div class="col-md-6 no padding-left">
                                <p>Miễn phí giao hàng</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tổng hóa đơn</label>
                            </div>
                            <div class="col-md-6 no padding-left">
                                <p>1000000</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endif
@endsection
