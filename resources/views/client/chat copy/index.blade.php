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
</style>

<div class="content">
    <div class="contact-profile">
        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
        <p>{{ $nguoinhan->ten_nd }}</p>
        <div class="social-media">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
             <i class="fa fa-instagram" aria-hidden="true"></i>
        </div>
    </div>
    <div class="messages">
        <ul>
            <li class="sent">
                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
            </li>
            <li class="replies">
                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                <p>When you're backed against the wall, break the god damn thing down.</p>
            </li>
        </ul>
    </div>
    <div class="message-input">
        <div class="wrap">
        <input type="text" placeholder="Write your message..." />
        <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
        <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
@push('chat')
    <script>
        $('.submit').click(function (e) {
            e.preventDefault();
            alert(123)
        });
    </script>
@endpush
@endsection
