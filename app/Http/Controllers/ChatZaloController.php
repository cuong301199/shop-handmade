<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class ChatZaloController extends Controller
{
    public function index(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $id_zalo = DB::table('zalo_chat')->where('id_nd',$id_nd)->first();
        return view('client.quanly-cuahang.chat_zalo.index',compact('id_zalo'));
    }

    public function store(Request $request){
        $id_zalo = $request->id_zalo;
        $id_nd = Auth::guard('nguoi_dung')->user()->id;

        $insert = DB::table('zalo_chat')->insert(
            [
                'id_nd'=>$id_nd,
                'id_oa'=>$id_zalo,
            ]
        );

        if($insert){
            Session::flash('success','thành công');
            return \redirect()->back();
        }

    }

    public function update(Request $request){
        $id_zalo = $request->id_zalo;
        $id_nd = Auth::guard('nguoi_dung')->user()->id;

        $update = DB::table('zalo_chat')->where('id_nd',$id_nd)->update(
            [
                'id_oa'=>$id_zalo,
            ]
        );

        if($update){
            Session::flash('update-success','thành công');
            return redirect()->back();
        }

    }
}
