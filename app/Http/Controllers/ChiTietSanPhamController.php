<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ChiTietSanPhamController extends Controller
{
    public function index($id){
        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('nguoi_dung','nguoi_dung.id','san_pham.id_nb')
        ->where('san_pham.id',$id)
        ->first();

        $hinhanh = DB::table('hinh_anh')
        // ->join('san_pham','san_pham.id','hinh_anh.id_sp')
        ->where('id_sp',$id)
        ->get();
        return view('client.chitietsanpham', compact('danhsach','hinhanh'));
    }
}
