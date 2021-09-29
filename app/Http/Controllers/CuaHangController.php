<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CuaHangController extends Controller
{
    public function index(){
        return view('admin.cuahang.index');
    }

    public function getStore(){
        $danhsach = DB::table('cua_hang')
        ->join('nguoi_dung','nguoi_dung.id','cua_hang.id_nd')
        // ->select('ten_dm','ten_lsp','id_dm',)
        ->select('cua_hang.*','ten_nd')
        ->get();
         return view('admin.cuahang.index', compact('danhsach'));


    }

    public function accepStore($id){
        $idQuanTri = Auth::guard('quan_tri')->user()->id;
        $update=DB::table('cua_hang')->where('id',$id)->update([
            'trangthai_ch'=>1,
            'id_qt'=>$idQuanTri,
        ]);
        $update_nd= DB::table('nguoi_dung')
        ->join('cua_hang','cua_hang.id_nd','nguoi_dung.id')
        ->where('cua_hang.id',$id)->update([
            'id_q'=>3,
        ]);
        return redirect()->back();
    }

    public function stopStore($id){
        $idQuanTri = Auth::guard('quan_tri')->user()->id;
        $update=DB::table('cua_hang')->where('id',$id)->update([
            'trangthai_ch'=>2,
            'id_qt'=>$idQuanTri,
        ]);
        $update_nd= DB::table('nguoi_dung')
        ->join('cua_hang','cua_hang.id_nd','nguoi_dung.id')
        ->where('cua_hang.id',$id)->update([
            'id_q'=>2,
        ]);
        return redirect()->back();
    }

    public function showStore($id){
        $cuahang = DB::table('cua_hang')
        ->where('id',$id)
        ->first();

        $sanpham = DB::table('san_pham')
        ->join('cua_hang','cua_hang.id','san_pham.id_ch')
        ->where('san_pham.id_ch',$id)
        ->get();

        return view('client.cuahang',compact('cuahang','sanpham'));
        }
}
