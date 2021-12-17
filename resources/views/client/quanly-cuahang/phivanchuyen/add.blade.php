@extends('client.quanly-cuahang.template.master')

@section('title')
    Thêm phí vận chuyển
@endsection

@section('title-page')
    Thêm phí vận chuyển
@endsection
@section('content')

    <body>
        <div class="container">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('phivanchuyen.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            {{-- {{ dd($danhsach) }} --}}

                            <label for="">Tên thành phố</label>
                            <select name="thanhPho" id="" class="form-control thanhPho">
                                @foreach ($tp as $item )
                                    <option value="{{ $item->matp }}">{{ $item->name_tp }}</option>
                                @endforeach
                            </select>
                            <label for="">Tên quận huyện</label>
                            <select name="quanHuyen" id="" class="form-control quanHuyen">
                                <option value="">Chọn quận huyện</option>
                            </select>
                            <label for="">Tên xã phường</label>
                            <select name="xaPhuong" id="" class="form-control xaPhuong">
                                <option value="">Chọn xã phường</option>
                            </select>
                            <label for="">Phí vận chuyển</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="phiVanChuyen"
                                placeholder="Nhập phí vận chuyển">
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
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
