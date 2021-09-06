@extends('client.template.master')
@section('content')
    <!-- page title -->
    <div class="page_title_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="page_title">
                        <h1>ĐĂNG NHẬP/ĐĂNG KÍ TÀI KHOẢN</h1>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bredcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ page title -->
    <div class="margin-bottom-70px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="login">
                        <h3>Đăng nhập</h3>
                        @if (Session::has('error-login'))
                            <p style="color: rgb(231, 22, 22)">{{ Session::get('error-login') }}</p>
                        @endif
                        <form action="{{ route('nguoi-dung.login') }}" method="post">
                            @csrf
                            <div class="col-md-6 no-padding-left">
                                <div class="email">
                                    <label for="your-email">Tài khoản<span class="required">*</span></label><br>
                                    <input type="text" name="tenDangNhap" value="" class="your-email" id="your-email">
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-right no-padding-left ">
                                <div class="password">
                                    <label for="password">Mật khẩu<span class="required">*</span></label><br>
                                    <input type="password" name="matKhau" value="" class="password" id="password"><br>
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-left">
                                <label for="remember" class="label-remember">
                                    <input type="checkbox" name="remember-pass" value="" class="remember-pass"
                                        id="remember"> Remember me!</label>
                            </div>

                            <div class="col-md-6 no-padding-left">
                                <a href="#">Quên mật khẩu?</a><br>
                            </div>
                            <div class="clear-fix"></div>

                            <div class="col-md-6 no-padding-left">
                                <button type="submit" style="border-radius: 1px; background-color:#1a1a1a"
                                    class="btn btn-primary btn-lg">Đăng nhập</button>
                            </div>
                        </form>
                        <div class="login-method col-md-12">
                            <div class="col-md-6 col-sm-6 no-padding-right no-padding-left">
                                <a class="method-facebook" href="#"><i class="fa fa-facebook"></i>Đăng nhập bằng
                                    Facebook</a>
                            </div>
                            <div class="col-md-6 col-sm-6 no-padding-left no-padding-right">
                                <a class="method-twitter" href="#"><i class="fa fa-twitter"></i>Đăng nhập bằng twitter</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="login">
                        <h3>tạo tài khoản</h3>
                        @if (Session::has('error'))
                            <p style="color: rgb(228, 51, 66)">{{ Session::get('error') }}</p>
                        @endif
                        @if (Session::has('success'))
                            <p style="color: rgb(34, 192, 42)">{{ Session::get('success') }}</p>
                        @endif
                        <form action="{{ route('nguoi-dung.register') }}" method="post">
                            @csrf
                            <div class="col-md-6 no-padding-left">
                                <div class="first-name">
                                    <label for="your-first-name">Họ và tên<span class="required">*</span></label><br>
                                    <input type="text" name="hoTen" value="" class="your-first-name" id="your-first-name">
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-right no-padding-left">
                                <div class="last-name">
                                    <label for="your-last-name">Tên đăng nhập<span class="required">*</span></label><br>
                                    <input type="text" name="tenDangNhap" value="" class="your-last-name"
                                        id="your-last-name">
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-left">
                                <div class="email">
                                    <label for="your-email1">Mật khẩu<span class="required">*</span></label><br>
                                    <input type="password" name="matKhau" value="" class="your-email" id="your-email1">
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-left">
                                <div class="recapture-text">
                                    <label for="confirm-email">Nhập lại mật khẩu<span class="required">*</span></label><br>
                                    <input type="password" name="reMatKhau" value="" class="your-email" id="confirm-email">
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-left">
                                <div class="email">
                                    <label for="your-email1">Email<span class="required">*</span></label><br>
                                    <input type="email" name="email" value="" class="your-email" id="your-email1">
                                </div>
                            </div>
                            <div class="col-md-6 no-padding-right no-padding-left">
                                <div class="last-name">
                                    <label for="your-last-name">Địa chỉ<span class="required">*</span></label><br>
                                    <input type="text" name="diaChi" value="" class="your-last-name"
                                        id="your-last-name">
                                </div>
                            </div>
                            <div class="col-md-6 no-padding-right no-padding-left">
                                <div class="last-name">
                                    <label for="your-last-name">Số điện thoại<span class="required">*</span></label><br>
                                    <input type="number" name="soDienThoai" value="" class="your-last-name"
                                        id="your-last-name">
                                </div>
                            </div>

                            <div class="clear-fix"></div>

                            <div class="col-md-6 no-padding-left">
                                <button type="submit" style="border-radius: 1px; background-color:#1a1a1a"
                                    class="btn btn-primary btn-lg">Đăng kí</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
