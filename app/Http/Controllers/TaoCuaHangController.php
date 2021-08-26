<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class TaoCuaHangController extends Controller
{
    public function RegisterStore(){
        return view('client.store.create');
    }


    public function handleCreate(Request $request){
        if(Auth::guard('nguoi_dung')->check()){
            $id_nd = Auth::guard('nguoi_dung')->user()->id;
            $insert = DB::table('cua_hang')->insert([
                'ten_ch'=>$request->tenCuaHang,
                'diachi_ch'=>$request->diaChi,
                'sdt_ch'=>$request->soDienThoai,
                'id_nd'=> $id_nd ,
            ]);
            dd('dang ki thanh cong');

    } else {
        dd('dang ki that bai');
    };
}
}

