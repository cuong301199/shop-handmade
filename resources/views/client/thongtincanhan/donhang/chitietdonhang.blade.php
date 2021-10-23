@extends('client.thongtincanhan.template.master')
@section('content')
<style>
    .html{
        font-size: 19px;
    }
    th{
        font-weight: bold;
    }
</style>
<div class="row">
    @if (Session::has('success'))
    <p style="color: rgb(34, 192, 42)">{{ Session::get('success') }}</p>
    @endif

    @if(Session::has('error'))
        <p style="color: rgb(190, 19, 42)" >{{ Session::get('error') }}</p>
    @endif
    <div class="col-md-12" style="border-bottom: 1px solid">
        <h2>Đơn hàng đã đặt</h2>
    </div>
    {{-- {{ dd($khachhang) }} --}}
</div>
<div class="row">
    <div class="col-md-12">
        <h4 >Thông tin người bán</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên người bán</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1; ?>

                    <tr>
                        <th scope="row">{{ $stt++ }}</th>
                        <td>B1973873</td>
                        <td>{{ $khachhang->ten_nd }}</td>
                        <td>{{ $khachhang->sdt_nd }}</td>
                        <td>{{ $khachhang->email_nd }}</td>
                    </tr>

            </tbody>
        </table>
    </div>

</div>
<div class="row">

    <div class="col-md-12">
        <h4 >Thông tin giao hàng</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên người bán</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1; ?>

                    <tr>
                        <th scope="row">{{ $stt++ }}</th>
                        <td>B1973873</td>
                        <td>{{ $khachhang->ten_nd }}</td>
                        <td>{{ $khachhang->sdt_nd }}</td>
                        <td>{{ $khachhang->email_nd }}</td>
                    </tr>

            </tbody>
        </table>
    </div>

</div>


@endsection
