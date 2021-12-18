<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Events\MessageSent;
class ChatController extends Controller
{
    public function index($id){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;

        $tinnhan = DB::table('tin_nhan')
        ->where(function ($query) use ($id, $id_nd) {
            $query->where('id_nguoigui', '=', $id)
                ->orWhere('id_nguoigui', '=', $id_nd);
        })->where(function ($query) use ($id, $id_nd) {
            $query->where('id_nguoinhan', '=', $id)
                ->orWhere('id_nguoinhan', '=', $id_nd);
        })->get();

        $nguoinhan= DB::table('nguoi_dung')->where('id',$id)->first();
        return view('client.chat.index', compact('nguoinhan','tinnhan','id_nd'));

    }
    public function send_message(Request $request ,$id_nguoinhan){
        $id_nguoigui = Auth::guard('nguoi_dung')->user()->id;
        $message = $request->message;
        $created_at =Carbon::now('Asia/Ho_Chi_Minh');

        $tinnhan = DB::table('tin_nhan')
        ->where(function ($query) use ($id_nguoigui, $id_nguoinhan) {
            $query->where('id_nguoigui', '=', $id_nguoigui)
                ->orWhere('id_nguoigui', '=', $id_nguoinhan);
        })->where(function ($query) use ($id_nguoigui, $id_nguoinhan) {
            $query->where('id_nguoinhan', '=', $id_nguoigui)
                ->orWhere('id_nguoinhan', '=', $id_nguoinhan);
        })->select('id', DB::raw('count(id) as total'))->get();



        if($request->hasFile('file')){
            // $hinhAnh = $request->file('file');
            // $tenFile = $hinhAnh->getClientOriginalName();
            // $hinhAnh->move(public_path('hinh-anh-tin-nhan/'),$tenFile);
            // $message = $hinhAnh->getClientOriginalName();
                ///////////////////////////////////
                $file = request('file');
                $path = $file->hashName('profiles');

                $disk = Storage::disk('public');

                $disk->put(
                    $path, $this->formatImage($file)
                );

                $photo = request()->user()->photos()->create([
                    'photo_url' => $disk->url($path),
                ]);
                //////////////////////////////////

            // foreach($tinnhan as $value => $item){
            //     if($item->total > 0 ){

            //         $insert3 = DB::table('tin_nhan')->insert(
            //             [
            //                 'id_nguoigui'=> $id_nguoigui,
            //                 'id_nguoinhan'=>$id_nguoinhan,
            //                 'noidung_tn'=>'hinh-anh-tin-nhan/'.$hinhAnh->getClientOriginalName(),
            //                 'created_at'=>  $created_at,
            //                 'kieu_tn'=>2,
            //             ]
            //         );
            //     }else{
            //         $insert = DB::table('phong_chat')->insertGetId([
            //             'ten_phong'=>"phong",
            //         ]);
            //         $insert1 = DB::table('nguoidung_phongchat')->insert(
            //             [
            //                 'id_phongchat'=>$insert,
            //                 'id_nd'=>$id_nguoigui,
            //             ]
            //         );
            //         $insert2 = DB::table('nguoidung_phongchat')->insert(
            //             [
            //                 'id_phongchat'=>$insert,
            //                 'id_nd'=>$id_nguoinhan,
            //             ]
            //         );
            //         $insert3 = DB::table('tin_nhan')->insert(
            //             [
            //                 'id_nguoigui'=> $id_nguoigui,
            //                 'id_nguoinhan'=>$id_nguoinhan,
            //                 'noidung_tn'=>'hinh-anh-tin-nhan/'.$hinhAnh->getClientOriginalName(),
            //                 'created_at'=>$created_at,
            //                 'kieu_tn'=>2,
            //             ]
            //         );
            //     }
            // }
            $type = 2;
        }
        else{
            foreach($tinnhan as $value => $item){
                if($item->total > 0 ){
                    $insert3 = DB::table('tin_nhan')->insert(
                        [
                            'id_nguoigui'=> $id_nguoigui,
                            'id_nguoinhan'=>$id_nguoinhan,
                            'noidung_tn'=>$message,
                            'created_at'=>  $created_at,
                            'kieu_tn'=>1,
                        ]
                    );
                }else{
                    $insert = DB::table('phong_chat')->insertGetId([
                        'ten_phong'=>"phong",
                    ]);
                    $insert1 = DB::table('nguoidung_phongchat')->insert(
                        [
                            'id_phongchat'=>$insert,
                            'id_nd'=>$id_nguoigui,
                        ]
                    );
                    $insert2 = DB::table('nguoidung_phongchat')->insert(
                        [
                            'id_phongchat'=>$insert,
                            'id_nd'=>$id_nguoinhan,
                        ]
                    );
                    $insert3 = DB::table('tin_nhan')->insert(
                        [
                            'id_nguoigui'=> $id_nguoigui,
                            'id_nguoinhan'=>$id_nguoinhan,
                            'noidung_tn'=>$message,
                            'kieu_tn'=>1,
                            'created_at'=>  $created_at,
                        ]
                    );
                }
            }
            $type = 1;
        }
        broadcast(new MessageSent( $message, $id_nguoigui,$id_nguoinhan, $created_at->format('d-m-Y'),$type));
    }


    public function load_message(Request $request){
        $id_nguoigui = Auth::guard('nguoi_dung')->user()->id;
        $id_nguoinhan = $request->id_nguoinhan;
        $output = '';

        $tinnhans = DB::table('tin_nhan')
        ->where(function ($query) use ($id_nguoigui, $id_nguoinhan) {
            $query->where('id_nguoigui', '=', $id_nguoigui)
                ->orWhere('id_nguoigui', '=', $id_nguoinhan);
        })->where(function ($query) use ($id_nguoigui,$id_nguoinhan ) {
            $query->where('id_nguoinhan', '=', $id_nguoigui)
                ->orWhere('id_nguoinhan', '=', $id_nguoinhan);
        })->get();
        if($tinnhans != null){
            foreach($tinnhans as $tinnhan => $item ){
                if($item->id_nguoigui == $id_nguoigui ){
                    if($item->kieu_tn==1){
                        $output.='<li class="replies">
                        <img style="font-size:13px;padding:0px" src=" '.asset('template-client').'/img/avatar1.png" alt="" />
                        <p style="font-size: 13px" class="text-right">'.$item->noidung_tn.'
                                    <br>
                            <label for="" style="color:#ccc8c8;font-size:9px">'.Carbon::parse($item->created_at)->format('d-m-Y') .'</label>
                        </p>
                        </li>';
                    }else{
                        $output.='<li class="replies">
                        <img style="font-size:13px;padding:0px" src=" '.asset('template-client').'/img/avatar1.png" alt="" />
                        <img class="hinhAnh"  style="padding:0px;width:150px;border-radius:0%"src="'.asset($item->noidung_tn).'" alt="">
                        </li>';
                    }
                }else{
                    if($item->kieu_tn==1){
                        $output.='<li class="sent ">
                        <img style="font-size:13px;padding:0px" src="'.asset('template-client').'/img/avatar1.png" alt="" />
                        <p style="font-size: 13px" class="text-left">'.$item->noidung_tn.'
                                    <br>
                            <label class="text-left" for="" style="color:#ccc8c8;font-size:9px">'.Carbon::parse($item->created_at)->format('d-m-Y') .'</label>
                        </p>
                        </li>';
                    }else{
                        $output.='<li class="sent">
                        <img style="font-size:13px;padding:0px" src="'.asset('template-client').'/img/avatar1.png" alt="" />
                        <img class="hinhAnh"  style="padding:0px;width:150px;border-radius:0%"src="'.asset($item->noidung_tn).'" alt="">
                        </li>';
                    }
                //     $output.='<li class="sent">
                //     <img style="font-size:13px;padding:0px" src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                //     <p style="font-size: 13px" class="text-right">'. $item->noidung_tn.'
                //      <br>
                //         <label for="" style="color:#ccc8c8;font-size:9px">'.Carbon::parse( $item->created_at)->format('d-m-Y') .'</label>
                //      </p>
                // </li>';
                }
            }

        }

        echo $output;
    }

    public function chat_home(){
        return view('client.chat.chat_home');
    }
}
// @if('.$item->id_nguoigui.' == '.$id_nguoigui.')
// <li class="replies">
//     <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
//     <p>'. $item->noidung_tn .'</p>
// </li>
// @else
// <li class="sent">
//     <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
//     <p>'. $item->noidung_tn .'</p>
// </li>
// @endif
// foreach($tinnhans as $tinnhan => $item ){
//     if($item->id_nguoigui == $id_nguoigui ){
//         if ($item->kieu_tn==1){
//             $output.='<li class="replies">
//             <img style="font-size: 13px" src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
//             <p style="font-size: 13px" class="text-right">'.$item->noidung_tn.'
//                         <br>
//                 <label for="" style="color:#ccc8c8;font-size:9px">'.Carbon::parse($item->created_at)->format('d-m-Y') .'</label>
//             </p>
//             </li>';
//         }else
//             $output.='<li class="replies">
//                     <img style="font-size: 13px" src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
//                     <img class="hinhAnh"  style="padding:0px;width:150px;border-radius:0%"src="{{ asset($item->noidung_tn) }}" alt="">
//             ';

//     }else{
//         $output.='<li class="sent">
//             <img style="font-size: 13px" src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
//             <p style="font-size: 13px" class="text-right">'. $item->noidung_tn.'
//              <br>
//                 <label for="" style="color:#ccc8c8;font-size:9px">'.Carbon::parse( $item->created_at)->format('d-m-Y') .'</label>
//              </p>
//         </li>';
//         }
// }
