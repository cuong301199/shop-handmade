@extends('client.chat.template.master')
@section('content')
<style>
#frame .content .contact-profile img{
    width:60px;

}
#frame .content .messages{
    height: auto;
    min-height: calc(100% - 93px);
    max-height: calc(100% - 93px);
    overflow-y: scroll;
    position: absolute;
    overflow-x: hidden;
    width: 660px;
}
.file{
    float: right;

}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
  padding: 0px 27px;
  width: 110px;
  height: 39px;
    cursor: pointer;
}
input[type="file"] {
    display: none;
}
/* #frame .content .messages ul li .hinhAnh{
    width:150px;
    height: auto;
    border-radius: 0%;
} */
</style>

<?php $id_nd = Auth::guard('nguoi_dung')->user()->id ?>
<div class="content">
    <div class="contact-profile">
        {{-- <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" /> --}}
        {{-- <p>{{ $nguoinhan->ten_nd }}</p> --}}
        <div class="social-media">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
             <i class="fa fa-instagram" aria-hidden="true"></i>
        </div>
    </div>

        <input type="hidden" name="" id="id_nguoinhan" value="">
    <div class="message-input" style="" >
        <div class="wrap">

        {{-- <i class="fa fa-paperclip attachment" aria-hidden="true"><input type="file" class="file"></i>
        <button class="submit" style="padding: 8px"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>  --}}
            <form action="" method="post">
                @csrf
                <div class="row" style="height: 40px">
                        <div class="col-md-1" style="padding: 0px; " >
                            <label class="custom-file-upload">
                                <i class="fa fa-images"></i>
                                <input type="file" class="file-image">
                            </label>
                        </div>
                    <div class="col-md-10" style="padding: 0px">
                        <input type="text" placeholder="Viết tin nhắn" id="message" style="height: 40px; border:1px solid; width:573px ">
                    </div>
                    <div class="col-md-1">
                        <button class="submit" style="padding: 6px;height:40px"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
