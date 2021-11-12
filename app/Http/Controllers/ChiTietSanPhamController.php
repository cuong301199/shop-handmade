<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ChiTietSanPhamController extends Controller
{
    public function index($id){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('nguoi_dung','nguoi_dung.id','san_pham.id_nb')
        ->where('san_pham.id',$id)
        ->select('loai_san_pham.*','nguoi_dung.*','san_pham.*')
        ->first();

        $sp = DB::table('san_pham')
        ->where('id_nb','<>',$danhsach->id_nb)
        ->where('id_lsp',$danhsach->id_lsp)
        ->where('san_pham.id_nb','<>',$id_nd)
        ->where('san_pham.id','<>',$danhsach->id)
        ->get();

        $hinhanh = DB::table('hinh_anh')
        // ->join('san_pham','san_pham.id','hinh_anh.id_sp')
        ->where('id_sp',$id)
        ->get();

        $sp_cungcuahang = DB::table('san_pham')
        ->where('id_nb',$danhsach->id_nb)
        ->where('san_pham.id_nb','<>',$id_nd)
        ->where('san_pham.id','<>',$danhsach->id)
        ->get();
        return view('client.chitietsanpham', compact('danhsach','hinhanh','sp','sp_cungcuahang'));
    }
}
