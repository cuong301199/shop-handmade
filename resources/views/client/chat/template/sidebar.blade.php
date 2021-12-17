<style>
    #frame #sidepanel #contacts ul li.contact .wrap img {
        width: 60px;
    }
</style>
<?php
$id_nd = Auth::guard('nguoi_dung')->user()->id;
$user1 = DB::table('nguoi_dung')
    ->where('id', $id_nd)
    ->first();
$tinnhan = DB::table('nguoidung_phongchat')
    ->where('id_nd', $id_nd)
    ->get();

if(!empty($tinnhan)){
    foreach ($tinnhan as $item => $value) {
    $user = DB::table('nguoidung_phongchat')
        ->where('id_phongchat', $value->id_phongchat)
        ->get();
    foreach ($user as $items => $values) {
        if ($values->id_nd != $id_nd) {
            $data[] = [
                'data' => $values->id_nd,
            ];
        }
    }
    }
}

if(!empty($data)){
    foreach ($data as $key => $nd) {
    $users = DB::table('nguoi_dung')
        ->where('id', $nd)
        ->get();
    $data_user[] = [
        'user' => $users,
    ];
}
}

?>
<div id="sidepanel">
    <div id="profile">
        <div class="wrap">
            {{-- <img id="profile-img" src="{{ asset($user1->anhdaidien_nd) }}" class="online" alt="" /> --}}
            <img id="profile-img" src="{{ asset('template-client') }}/img/avatar1.png" class="online" alt="" />
            <p>{{ $user1->ten_nd }}</p>
            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
            <div id="status-options">
                <ul>
                    <li id="status-online" class="active"><span class="status-circle"></span>
                        <p>Online</p>
                    </li>
                    <li id="status-away"><span class="status-circle"></span>
                        <p>Away</p>
                    </li>
                    <li id="status-busy"><span class="status-circle"></span>
                        <p>Busy</p>
                    </li>
                    <li id="status-offline"><span class="status-circle"></span>
                        <p>Offline</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="search">
        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
        <input type="text" placeholder="Tìm kiếm" />
    </div>
    <div id="contacts">
        @if (!empty($data_user))
        @foreach ($data_user as $key => $value1)
            @foreach ($value1 as $value2 => $key2)
                @foreach ($key2 as $value3)
                <ul>
                    <a href="{{ route('chat.index', ['id' => $value3->id]) }}" id="content" style="width:100%">
                        <li class="contact">
                            <div class="wrap">
                                <span class="contact-status online"></span>
                               <img src="{{ asset('template-client') }}/img/avatar1.png" alt="" />
                                <div class="meta">
                                    <p class="name">{{ $value3->ten_nd }}</p>
                                </div>
                            </div>
                        </li>
                    </a>
                </ul>
                @endforeach
            @endforeach
        @endforeach
        @endif
    </div>

    {{-- <div id="bottom-bar">
        <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add
                contact</span></button>
        <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
    </div> --}}
</div>
