@extends('client.template.master')
@section('content')
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
            <form action="{{ route('shipping.create') }}" method="post">
                @csrf
                <div class="col-md-6">
                    <div class="billing margin-bottom-50px">
                        <h2>Điền thông tin vận chuyển</h2>
                        <div class="info-sec">
                            <div class="company-name">
                                <label for="company-name">Họ tên</label><br>
                                <input type="text" name="ten" value="" id="company-name">
                            </div>
                            <div class="form-group">
                            <label for="">Tên thành phố</label>
                            <select name="thanhPho" id="" class=" thanhPho">
                                @foreach ($tp as $item )
                                    <option value="{{ $item->matp }}">{{ $item->name_tp }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">Tên quận huyện</label>
                            <select name="quanHuyen" id="" class="quanHuyen">
                                <option value="">Chọn quận huyện</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">Tên xã phường</label>
                            <select name="xaPhuong" id="" class=" xaPhuong">
                                <option value="">Chọn xã phường</option>
                            </select>
                            </div>
                            <div class="your-address">
                                <label for="company-name">Địa chỉ<span class="required">*</span></label>
                                <input type="text" name="diachi" placeholder="" id="your-address">
                            </div>
                            <div class="your-email col-md-6 no-padding-left">
                                <label for="your-email">Email <span class="required">*</span></label>
                                <input type="text" name="email" placeholder="" id="your-email">
                            </div>

                            <div class="phone-number col-md-6 no-padding-left no-padding-right">
                                <label for="phone-number">Số điện thoại <span class="required">*</span></label><br>
                                <input type="text" name="sdt" value="" placeholder="" id="phone-number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 no-padding-left margin-top-20">
                        <button type="submit" style="border-radius: 1px;margin-top:20px; background-color:#1a1a1a"
                            class="btn btn-primary btn-lg">Lưu thông tin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('addCity')
    <script>
        $(document).ready(function() {
                const BASE_URL = window.location.origin //lấy base url
                $('select.thanhPho').change(function(e) {
                    e.preventDefault();
                    var getIDCity = $(this).children("option:selected").val();
                    console.log(getIDCity);
                    console.log('124')
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
                        url: BASE_URL+ "/client/get-wards/" + getIDProvince,
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                $('.xaPhuong').append('<option value="' + response[i].maxa +
                                    '"class="itemWards" >' + response[i].name_xa + '</option>');

                            }

                        }
                    });
                });

            });
    </script>
@endpush
