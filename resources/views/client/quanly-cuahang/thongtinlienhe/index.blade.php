@extends('client.quanly-cuahang.template.master')

@section('title')
    Thông tin liên hệ
@endsection

@section('title-page')
     Thông tin liên hệ
@endsection
@section('content')
    {{-- {{ dd($danhsach_dm) }} --}}

    <body>
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    @if($infor == null)
                    <form action="{{route('thongtinlienhe.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                 Thông tin liên hệ
                                @if (Session::has('success'))
                                    <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
                                @endif
                                @if (Session::has('error'))
                                    <p style="color: rgb(218, 21, 31)">{{ Session::get('error') }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" name="diachi_ttlh" id="" class="form-control"
                                                placeholder="Địa chỉ" aria-describedby="helpId">
                                        </div>   
                                        
                                        <div class="form-group">
                                            <label for="">Bản đồ</label>
                                            <input type="text" name="bando_ttlh" id="" class="form-control"
                                                placeholder="Bản đồ" aria-describedby="helpId">
                                        </div>                                     
                                    </div>       
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Giới thiệu</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="gioithieu_ttlh"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Thêm thông tin</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    @else
                        <form action="{{route('thongtinlienhe.update',['id' => $infor->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                 Thông tin liên hệ
                                @if (Session::has('success'))
                                    <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
                                @endif
                                @if (Session::has('error'))
                                    <p style="color: rgb(218, 21, 31)">{{ Session::get('error') }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" name="diachi_ttlh" id="" class="form-control"
                                                placeholder="" value="{{$infor->diachi_ttlh}}" aria-describedby="helpId">
                                        </div>   
                                        
                                        <div class="form-group">
                                            <label for="">Bản đồ</label>
                                            <input type="text" name="bando_ttlh" id="" class="form-control"
                                               value="{{$infor->bando_ttlh}}" placeholder="Bản đồ" aria-describedby="helpId">
                                        </div>      
                                        {!!$infor->bando_ttlh!!}                              
                                    </div>       
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Giới thiệu</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="gioithieu_ttlh" 
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$infor->gioithieu_ttlh}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </section>
        </main>

    </body>
@endsection
