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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1; ?>
                @foreach ($khachhang as $item)
                    <tr>
                        <th scope="row">{{ $stt++ }}</th>
                        <td>B1973873</td>
                        <td>{{ $item->tong_tien }} VND</td>
                        <td>
                            <a href="{{ route('oderuser.detail', ['id'=>$item->id]) }}"><button
                                    class='btn btn-warning'>Xem chi tiết</button></a>
                            <a href=""><button
                                    class='btn'>{{ $item->ten_tt }}</button></a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
