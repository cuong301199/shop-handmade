@extends('client.quanly-cuahang.template.master')

@section('title')
    Thêm danh mục cửa hàng
@endsection

@section('title-page')
    Thêm danh mục muốn cửa hàng
@endsection
@section('content')

    <body>
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    <form action="{{ route('quanlydanhmuc.post') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Thêm danh mục
                                {{-- @if (Session::has('success'))
                                    <p style="color: rgb(20, 163, 16)" >{{ Session::get('success') }}</p>
                                @endif --}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($danhsach as $item)
                                            <div class="form-check" style="margin-bottom: 5px">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    name="chonDanhMuc[]" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $item->ten_dm }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Lưu danh mục</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>

    </body>
@endsection
