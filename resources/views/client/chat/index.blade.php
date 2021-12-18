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
        <img src="{{ asset('template-client') }}/img/avatar1.png" alt="" />
        <p>{{ $nguoinhan->ten_nd }}</p>
        <div class="social-media">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
             <i class="fa fa-instagram" aria-hidden="true"></i>
        </div>
    </div>
    <div class="show-message">
        @if($tinnhan != null)
            <div class="messages">
                    {{-- @foreach ($tinnhan as $item) --}}
                        <ul class="messages_ul">
                            {{-- @if($item->id_nguoigui == $id_nd)
                                <li class="replies">
                                    <img style="padding:0px" src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                        @if ($item->kieu_tn == 1)
                                        <p style="font-size: 13px" class="text-right">{{ $item->noidung_tn }}
                                            <br>
                                            <label for="" style="color:#ccc8c8;font-size:9px">{{Carbon\Carbon::parse( $item->created_at)->format('d-m-Y') }}</label>
                                        </p>
                                        @else
                                        <img class="hinhAnh"  style="padding:0px;width:150px;border-radius:0%"src="{{ asset($item->noidung_tn) }}" alt="">
                                        @endif
                                </li>
                            @else
                                <li class="sent">
                                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                    <p>{{ $item->noidung_tn }}</p>
                                </li>
                            @endif --}}
                        </ul>
                    {{-- @endforeach --}}
            </div>
        @endif
    </div>
        <input type="hidden" name="" id="id_nguoinhan" value="{{ $nguoinhan->id }}">
        <input type="hidden" name="" id="id_nguoigui" value="{{ $id_nd }}">
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

@push('chat')
    <script>
        $(document).ready(function () {

            var id_nguoinhan = $('#id_nguoinhan').val();
            var id_nguoigui = $('#id_nguoigui').val();
            load_message()

            function load_message() {
                    $.ajax({
                        type: "get",
                        url: "/client/load-message/" ,
                        data: {
                           id_nguoinhan:id_nguoinhan,
                        },
                        success: function(data) {
                           $('ul.messages_ul').html(data)
                           $('.messages').scrollTop(1000)
                        }
                    });
            }

            $('.submit').click(function (e) {
                e.preventDefault();
                var id_nguoinhan = $('#id_nguoinhan').val();
                var message = $('#message').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/client/send-message/" + id_nguoinhan ,
                        data: {
                            id_nguoinhan:id_nguoinhan,
                            message:message,
                        },
                            success: function (response) {
                                load_message()
                                $('#message').val('')
                            }
                    });
            });



            $('.file-image').change(function (e) {
                e.preventDefault();
                var id_nguoinhan = $('#id_nguoinhan').val();
                var form_data = new FormData;
                var file_image = $('.file-image').prop('files')[0];
                form_data.append('file',file_image);
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({
                        type: "post",
                        url: "/client/send-message/" + id_nguoinhan  ,
                        contentType: false,
                        processData: false,
                        // cache:false,
                        data:form_data,
                        success: function (response) {
                            load_message()
                            $('#message').val('')
                        }
                    });
            });

            var pusher = new Pusher('7a9dede1a4324a782371', {
            cluster: 'ap1',
            encrypted: true
            });
            var channel = pusher.subscribe('channel-demo-real-time');
            //Bind một function addMesagePusher với sự kiện DemoPusherEvent
            channel.bind('App\\Events\\MessageSent', addMessageDemo);



            function addMessageDemo(data) {
                if(parseInt(data.id_from) != parseInt(id_nguoigui) ){
                    if(parseInt(id_nguoinhan) == parseInt(data.id_to)){
                        if(parseInt(data.type) == 1){
                            $('ul.messages_ul').append('<li class="replies">'+
                                     '<img style="padding:0px" src="{{asset('template-client')}}/img/avatar1.png" alt="" />'+
                                    '<p style="font-size: 13px" class="text-right">'+data.message+''+
                                        '<br>'+
                                        '<label class="text-left" for="" style="color:#ccc8c8;font-size:9px">'+data.created_at+'</label>'+
                                        '</p>'+
                                '</li>');
                            $('.messages').scrollTop(1000)
                        }else{
                            $('ul.messages_ul').append('<li class="replies">'+
                                '<img style="font-size:13px;padding:0px" src="{{asset('template-client')}}/img/avatar1.png" alt="" />'+
                                '<img class="hinhAnh"  style="padding:0px;width:150px;border-radius:0%"src="{{ asset('+data.message+') }}" alt="">'+
                                '</li>');
                            $('.messages').scrollTop(1000)
                        }

                    }else{
                        if(parseInt(data.type) == 1){
                            $('ul.messages_ul').append('<li class="sent">'+
                                     '<img style="padding:0px" src="{{asset('template-client')}}/img/avatar1.png" alt="" />'+
                                    '<p style="font-size: 13px" class="text-right">'+data.message+''+
                                        '<br>'+
                                        '<label  class="text-left" for="" style="color:#ccc8c8;font-size:9px">'+data.created_at+'</label>'+
                                        '</p>'+
                                '</li>');
                            $('.messages').scrollTop(1000)
                        }else{
                            $('ul.messages_ul').append('<li class="sent">'+
                                '<img style="font-size:13px;padding:0px" src="{{asset('template-client')}}/img/avatar1.png" alt="" />'+
                                '<img class="hinhAnh"  style="padding:0px;width:150px;border-radius:0%"src="{{ asset('+data.message+') }}" alt="">'+
                                '</li>');
                            $('.messages').scrollTop(1000)
                        }
                    }
                }
            }
        }

        );

    </script>
@endpush
@endsection
