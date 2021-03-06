<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class ChonDanhMucController extends Controller
{
     public function choose_category(Request $request){

        $chonDanhMuc = $request->chonDanhMuc;
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        // $id_ch = DB::table('cua_hang')->where('id',$id_nd)->first();
        foreach($chonDanhMuc as $item ){
            DB::table('cuahang_danhmuc')->insert(
                [
                    'id_dm'=>$item,
                    'id_nb'=>$id_nd
                ],
            );

        // return view('client.quanly-cuahang.danhmuc.index',compact('chonDanhMuc'));

        };
        return redirect()->route('quanlydanhmuc.index',);
    }

    public function index(){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        // $id_ch = DB::table('cua_hang')->where('id',$id_nd)->first();
        $danhsach= DB::table('cuahang_danhmuc')
        ->join('danh_muc','danh_muc.id','cuahang_danhmuc.id_dm')
        ->select('cuahang_danhmuc.*','ten_dm')
        ->where('cuahang_danhmuc.id_nb',$id_nd)
        ->get();
        $danhsach_dm= DB::table('cuahang_danhmuc')
        ->join('danh_muc','danh_muc.id','cuahang_danhmuc.id_dm')
        ->select('cuahang_danhmuc.*','ten_dm')
        ->where('cuahang_danhmuc.id_nb',$id_nd)
        ->first();

        return view('client.quanly-cuahang.danhmuc.index',compact('danhsach','danhsach_dm'));

    }

    public function create(){
        $danhsach= DB::table('danh_muc')->get();
        return view('client.quanly-cuahang.danhmuc.add',compact('danhsach'));
    }

    public function delete($id_nb, $id_dm){
        // $id_nd = Auth::guard('nguoi_dung')->user()->id;
        // $id_ch = DB::table('cua_hang')->where('id',$id_nd)->first();
        $id = DB::table('cuahang_danhmuc')
        ->where('id_nb',$id_nb)
        ->where('id_dm',$id_dm)
        ->delete();

        return redirect()->back();
    }

    public function edit(){
        $danhsach_dm= DB::table('danh_muc')->get();
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        // $id_ch = DB::table('cua_hang')->where('id',$id_nd)->first();
        $danhsach= DB::table('cuahang_danhmuc')
        ->join('danh_muc','danh_muc.id','cuahang_danhmuc.id_dm')
        ->select('cuahang_danhmuc.*','ten_dm')
        ->where('cuahang_danhmuc.id_nb',$id_nd)
        ->get();

        return view('client.quanly-cuahang.danhmuc.edit',compact('danhsach_dm','danhsach'));
    }

    public function update(Request $request){
        $chonDanhMuc = $request->chonDanhMuc;
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        foreach($chonDanhMuc as $item ){

            DB::table('cuahang_danhmuc')->insert(
                [
                    'id_dm'=>$item,
                    'id_nb'=>$id_nd
                ],
            );

    }
    return redirect()->route('quanlydanhmuc.index');


}
}

