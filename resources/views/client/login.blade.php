@extends('client.template.master')
@section('content')

    <style>

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Đăng kí</h2>

                <form action="{{ route('nguoi-dung.register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:bold;">Username</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="tenDangNhap"
                            placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-weight:bold;">Mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="matKhau"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:bold;">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="reMatKhau"
                            placeholder="Enter email">

                    </div>

                    <button type="submit" class="btn btn-primary">Đăng kí</button>
                </form>

            </div>
            <div class="col-md-6">
                <h2>Đăng nhập</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" style="font-weight:bold;">Username</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="tenDangNhap"
                            placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-weight:bold;">Mật khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="matKhau"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>

            </div>
        </div>
    </div>
@endsection
