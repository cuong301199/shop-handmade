<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use  Session;
class ThongTinLienHeController extends Controller
{
    public function index()
    {
        $id_nd = Auth::guard('nguoi_dung')->user()->id;   
        $infor = DB::table('thong_tin_lien_he')
        ->join('nguoi_dung','nguoi_dung.id','thong_tin_lien_he.id_nd')
        ->where('thong_tin_lien_he.id_nd',$id_nd)
        ->first();
        return view('client.quanly-cuahang.thongtinlienhe.index',compact('infor'));
    }
    public function store(Request $request){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $diachi_ttlh = $request->diachi_ttlh;
        $bando_ttlh = $request->bando_ttlh;
        $gioithieu_ttlh= $request->gioithieu_ttlh;
        
        $insert = DB::table('thong_tin_lien_he')->insert(
            [
                'id_nd'=>$id_nd,
                'diachi_ttlh'=>$diachi_ttlh,
                'bando_ttlh'=>$bando_ttlh,
                'gioithieu_ttlh'=>$gioithieu_ttlh
            ]);
        if($insert){
            Session::flash("success","Thêm thành công");
            return redirect()->route('thongtinlienhe.index');
        }
    }
    public function update(Request $request,$id){
        $diachi_ttlh = $request->diachi_ttlh;
        $bando_ttlh = $request->bando_ttlh;
        $gioithieu_ttlh= $request->gioithieu_ttlh;
    
      
        $update = DB::table('thong_tin_lien_he')->where('id_nd',$id)->update(
            [
                'diachi_ttlh'=>$diachi_ttlh,
                'bando_ttlh'=>$bando_ttlh,
                'gioithieu_ttlh'=>$gioithieu_ttlh
            ]);
        if($update){
            Session::flash("success","Cập nhật thành công");
            return redirect()->route('thongtinlienhe.index');
        }
    }
}
