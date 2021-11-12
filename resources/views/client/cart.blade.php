@extends('client.template.master')
@section('content')
{{-- {{ dd(Session::get('success-update-cart')) }} --}}
<style>
    .image-product .img{
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

<div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <h1>Giỏ hàng</h1>
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
        {{-- <div class="col-md-6">
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
        </div> --}}
        {{-- {{ dd(Cart::content()->groupBy('options.id_nb')) }} --}}

    </div>

    @foreach (Cart::content()->groupBy('options.id_nb') as $item => $key)
    <?php
        $totalPrice = 0;
        $quanty = 0;
     ?>
    {{-- <form action="{{ route('checkout') }}" method="get"> --}}
        @csrf
        <div class="row row-container">
            <div class="col-md-7 product-cart">
                <div class="row">
                <div class="col-md-12">
                        <?php
                            $tenNguoiDung = DB::table('nguoi_dung')->where('id',$item)->first();
                        ?>
                        Tên người bán : <a href="">{{ $tenNguoiDung->ten_nd }}</a>
                </div>
                </div>
                @foreach ($key as $value )
                <div class="row" id="input-total-price">
                    <div class="col-md-3">
                        <div class="image-product">
                            {{-- <a href=""><img src="{{ asset($value->options['duongdan_ha'] ) }}" alt=""></a> --}}
                            <img src="{{ asset($value->options['duongdan_ha'] ) }}" class="img-thumbnail img" alt="Cinque Terre">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="content-product">
                            <h4>{{ $value->name}}</h4>
                            <div class="price">
                                <del>{{number_format($value->price + ($value->price * 10/100))}} VND</del>{{number_format( $value->price )}} VND  X  {{ $value->qty }}
                            </div>
                            <button type="button" class="btn btn-xs btn-update-cart">Cập nhật</button>
                            <a href="{{ route('Delete.cart', ['rowId'=>$value->rowId]) }}" class="btn btn-xs btn-primary">Xóa </a>
                        </div>

                    </div>
                    <div class="col-md-3">
                            <div class="quantity">
                            <input id="qty" type="number" step="1" min="0" max="99" name="cart"
                                    value="{{ $value->qty }}" title="Qty" class="qty">
                            <input id="rowId" type="hidden"  value="{{$value->rowId}}">
                        </div>
                    </div>
                    <?php
                        $totalPrice+=$value->qty * $value->price;
                        $quanty+=$value->qty;
                    ?>
                </div>
                @endforeach

                <input id="total" type="hidden" name="tong_tien" value="{{$totalPrice}}">
                <input id="total" type="hidden" name="tong_sp" value="{{ $quanty}}">
                <input id="total" type="hidden" name="id_nb" value="{{ $item}}">

                {{-- <div class="row">
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
                    </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6">
                        <button type="submit" style="border-radius: 1px; background-color:#1a1a1a; margin-top:20px;"
                            class="btn btn-primary btn-lg">Thanh Toán</button>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-5">
                <div class="payment">
                    <h3>Tổng đơn hàng</h3>
                    <div class="payment-method">
                        {{-- <table>
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
                        </table> --}}

                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tổng tiền</label>
                            </div>
                            <div class="col-md-6 no padding-left">
                                <p>{{number_format( $totalPrice) }} VND</p>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-3">
                                <label for="">Phí giao hàng</label>
                            </div>
                            <div class="col-md-6 no padding-left">
                                <p>Miễn phí giao hàng</p>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tổng hóa đơn</label>
                            </div>
                            <div class="col-md-6 no padding-left">
                                <p>{{number_format( $totalPrice) }} VND</p>
                            </div>
                        </div>
                    </div>
                     {{-- <?php
                    $id_nd= Auth::guard('nguoi_dung')->user()->id;
                    $ttvc = DB::table('thong_tin_van_chuyen')->where('id_nm',$id_nd)->first()?>  --}}
                    <div class="row">
                        {{-- {{ dd($ttvc) }} --}}
                        {{-- @if ($ttvc == null)
                        <div class="col-md-6">
                            <a style="margin-top:20px" href="{{ route('checkout', ['id'=> $item ]) }}" class="trendify-btn black-bordered">Thanh toán</a>
                        </div>
                        @else --}}
                        <div class="col-md-6">
                            <a style="margin-top:20px" href="{{ route('thanhtoan.index',['id'=> $item ]) }}" class="trendify-btn black-bordered">Thanh toán</a>
                        </div>
                        {{-- @endif --}}
                    </div>
                    {{-- <div class="cupon-code margin-top-20px">
                        <input type="submit" name="checkout" value="place an order" class="btn-black calculate">
                    </div> --}}

                    {{-- <a href="{{ route('checkout') }}" style="width:250px;"><input type="submit" name="checkout" value="checkout"
                        class="btn-black calculate margin-bottom-100px"></a> --}}
                </div>
            </div>
        </div>
    {{-- </form> --}}
    @endforeach
</div>
@endif
@endsection
@push('Add-Cart')
    @if(Session::has('success'))
    <script>
        $.alert({
            title: 'Thông báo!',
            content: 'Cập nhật giỏ hàng thành công!',
        });
    </script>
    @endif
@endpush
@push('input-total-price')

    <script>
        $('.btn-update-cart').click(function (e) {
            e.preventDefault();
            var qty = $('#qty').val();
            var rowId = $('#rowId').val();
           $.ajax({
               type: "get",
               url: "/client/cart-list-update",
               data: {
                    qty:qty,
                    rowId:rowId,
               },
               success: function (response) {
                    location.reload()
               }
           });
        });
    </script>
@endpush
