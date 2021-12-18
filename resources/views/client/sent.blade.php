@extends('client.template.master')
@section('content')
<?php $id_nd = Auth::guard('nguoi_dung')->user()->id ?>



<form action="{{ route('send.message') }}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- <input type="" name="id_from"  value="{{$id_nd }}">
    <input type="" name="id_to"> --}}
   <input type="file" name="message" id="">
    <button type="submit"> gửi</button>
</form>

@endsection
