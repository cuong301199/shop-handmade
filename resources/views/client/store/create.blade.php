@extends('client.template.master')
@section('content')
    <!-- page title -->
    <div class="page_title_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="page_title">
                        <h1>ĐĂNG KÍ CỬA HÀNG</h1>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="bredcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Đăng kí cửa hàng</a></a></li>
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
                        <h3>Đăng kí</h3>
                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                            <div class="col-md-6 no-padding-left">
                                <div class="email">
                                    <label for="your-email">Tên cửa hàng<span class="required">*</span></label><br>
                                    <input type="text" name="tenCuaHang" value="" class="your-email" id="your-email">
                                </div>
                            </div>

                            <div class="col-md-6 no-padding-right no-padding-left ">
                                <div class="password">
                                    <label for="password">Địa chỉ<span class="required">*</span></label><br>
                                    <input type="text" name="diaChi" value="" class="password" id="password"><br>
                                </div>
                            </div>
                            <div class="col-md-6 no-padding-right no-padding-left ">
                                <div class="password">
                                    <label for="password">Số điện thoại<span class="required">*</span></label><br>
                                    <input type="text" name="soDienThoai" value="" class="password" id="password"><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <button type="submit" style="border-radius: 1px; background-color:#1a1a1a"
                                        class="btn btn-primary btn-lg">Đăng kí</button>
                                </div>
                            </div>




                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
