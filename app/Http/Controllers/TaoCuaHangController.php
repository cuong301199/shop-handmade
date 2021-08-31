<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class TaoCuaHangController extends Controller
{
    public function RegisterStore(){
        $danhsach = DB::table('danh_muc')->get();
        return view('client.store.create',compact('danhsach'));
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



            Session::flash("success","Đăng kí thành công");
            return redirect()->back();

        } else {
            Session::flash("error","Đăng kí không thành công");
            return redirect()->back();
        };
    }




    // public function handleCreate(Request $request){
    //     if(Auth::guard('nguoi_dung')->check()){
    //         $id_nd = Auth::guard('nguoi_dung')->user()->id;
    //         $insert = DB::table('cua_hang')->insert([
    //             'ten_ch'=>$request->tenCuaHang,
    //             'diachi_ch'=>$request->diaChi,
    //             'sdt_ch'=>$request->soDienThoai,
    //             'id_nd'=> $id_nd ,
    //         ]);
    //         Session::flash("success","Đăng kí thành công");
    //         return redirect()->back();

    //     } else {
    //         Session::flash("error","Đăng kí không thành công");
    //         return redirect()->back();
    //     };
    // }


    // public function choose_category(Request $request){

    //     $chonDanhMuc = $request->chonDanhMuc;
    //     $id_nd = Auth::guard('nguoi_dung')->user()->id;
    //     $id_ch = DB::table('cua_hang')->where('id',$id_nd)->first();

    //     foreach($chonDanhMuc as $item){
    //         DB::table('cuahang_danhmuc')->insert(
    //             [
    //                 'id_dm'=>$item,
    //                 'id_ch'=>$id_ch
    //             ],
    //         );
    //     }

    // }
}
