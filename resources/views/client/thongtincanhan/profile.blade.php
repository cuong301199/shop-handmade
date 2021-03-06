@extends('client.thongtincanhan.template.master')
@section('content')
    <form action="{{ route('profile.update', ['id'=>Auth::guard('nguoi_dung')->user()->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <?php $anhdaidien_nd =Auth::guard('nguoi_dung')->user()->anhdaidien_nd ?>
            @if ($anhdaidien_nd==null)
            <div class="col-md-4" style="margin:10px 190px">
                <div class="form-group" >
                    <img src="{{ asset('template-client') }}/img/avatar1.png" width="50%" class="img-circle" alt=""><br>
                    <label for="">Chọn ảnh đại diện</label>
                    <input type="file" name="anhdaidien_nd" id="" class="form-control-file" placeholder="Hình ảnh"
                    aria-describedby="helpId">
                </div>
            </div>
            @else
            <div class="col-md-4" style="margin:10px 190px">
                <div class="form-group" >
                    <img src="{{asset($danhsach->anhdaidien_nd) }}" width="50%" class="img-circle" alt=""><br>
                    <label for="">Chọn ảnh đại diện</label>
                    <input type="file" name="anhdaidien_nd" id="" class="form-control-file" placeholder="Hình ảnh"
                    aria-describedby="helpId">
                </div>
            </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label for="">Họ và Tên</label>
                    <input type="text" name="hoVaTen" value="{{ $danhsach->ten_nd }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" value="{{ $danhsach->email_nd }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                {{-- <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="diaChi" id="" value="{{ $danhsach->diachi_nd }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div> --}}
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="soDienThoai" id="" value="{{ $danhsach->sdt_nd }}" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>

                <div class="row">
                    <div class="col-md-auto">
                        <div class="cupon-code text-right" style="margin:30px;width:200px;">
                            <input type="submit" name="checkout" value="Lưu" class="btn-black calculate">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>




@endsection

