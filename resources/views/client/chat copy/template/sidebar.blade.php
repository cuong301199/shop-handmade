
<style>
#frame #sidepanel #contacts ul li.contact .wrap img{
    width:60px;
}
</style>
<?php
    $id_nd = Auth::guard('nguoi_dung')->user()->id;
    $user = DB::table('nguoi_dung')->where('id',$id_nd)->first();
    $tinnhan = DB::table('nguoidung_phongchat')->where('id_nd',1)->get();
    foreach($tinnhan as $item => $value){
        $user = DB::table('nguoidung_phongchat')->where('id_phongchat',$value->id_phongchat)->get();
       foreach($user as $items =>$values){
            if($values->id_nd != 1){
                $data[] =array(
                    'data'=>$values->id_nd,
                );
            }
       }
    }
    foreach ($data as $key ) {
        $users = DB::table('nguoi_dung')->where('id',$key['data']);
    }

?>

{{ dd($users) }}
<div id="sidepanel">
    <div id="profile">
        <div class="wrap">
            <img id="profile-img" src="{{ asset($user->anhdaidien_nd) }}" class="online" alt="" />
            <p>{{ $user->ten_nd }}</p>
            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
            <div id="status-options">
                <ul>
                    <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
                    <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
                    <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
                    <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
                </ul>
            </div>
            {{-- <div id="expanded">
                <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
                <input name="twitter" type="text" value="mikeross" />
                <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
                <input name="twitter" type="text" value="ross81" />
                <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
                <input name="twitter" type="text" value="mike.ross" />
            </div> --}}
        </div>
    </div>
    <div id="search">
        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
        <input type="text" placeholder="Search contacts..." />
    </div>
    @foreach($data as $key => $nd)
        $users = DB::table('nguoi_dung')->where('id',$nd)->get();

    <div id="contacts">
        <ul>
            <li class="contact">
                <div class="wrap">
                    <span class="contact-status online"></span>
                    <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                    <div class="meta">
                        <p class="name">Louis Litt</p>
                    </div>
                </div>
            </li>
            <li class="contact active">
                <div class="wrap">
                    <span class="contact-status busy"></span>
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <div class="meta">
                        <p class="name">Harvey Specter</p>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    @endforeach
    <div id="bottom-bar">
        <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
        <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
    </div>
</div>
