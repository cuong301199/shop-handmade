<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HienThiSanPhamController extends Controller
{
    public function index(){
        $danhsachsanpham = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('cua_hang','cua_hang.id','san_pham.id_ch')
        ->join('hinh_anh','hinh_anh.id_sp','san_pham.id')
        ->get();
        return view('client.index', compact('danhsachsanpham'));
    }
}
