@extends('client.thongtincanhan.template.master')
@section('content')
    <div class="row">
        @if (Session::has('success'))
        <p style="color: rgb(34, 192, 42)">{{ Session::get('success') }}</p>
        @endif

        @if(Session::has('error'))
            <p style="color: rgb(190, 19, 42)" >{{ Session::get('error') }}</p>
        @endif
        {{-- {{ dd($pass_old) }} --}}
        {{-- {{ dd($password) }} --}}
        <div class="col-md-12" style="border-bottom: 1px solid">
            <span style="font-weight: bold">ĐỔI MẬT KHẨU </span>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('password.update', ['id'=>Auth::guard('nguoi_dung')->user()->id]) }}" method="post">

           @csrf
            {{-- <div class="col-md-6 col-md-offset-2">
                <div class="form-group">
                    <label for="" class="">Họ và Tên</label>
                    <input type="text" name="hoVaTen" value="" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-8 col-md-offset-1 " style="margin-top: 20px" >
                    <div class="form-group">
                        <label style="padding-right: 0px"  for="inputEmail3" class="col-sm-3 control-label">Mật khẩu cũ</label>
                        <div class="col-sm-6">
                          <input type="password" name="pass" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-1 " style="margin-top: 20px" >
                    <div class="form-group">
                        <label style="padding-right: 0px"  for="inputEmail3" class="col-sm-3 control-label">Mật khẩu mới</label>
                        <div class="col-sm-6">
                          <input type="password" name="passNew" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-1 " style="margin-top: 20px" >
                    <div class="form-group">
                        <label style="padding-right: 0px"  for="inputEmail3" class="col-sm-3 control-label">Nhập lại mật khẩu mới</label>
                        <div class="col-sm-6">
                          <input type="password" name="rePassNew" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <div class="cupon-code text-right" style="margin:30px;width:200px;">
                        <input type="submit" name="checkout" value="Lưu" class="btn-black calculate">
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection
