<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HienThiSanPhamController extends Controller
{
    public function index($id){
        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->where('san_pham.id_lsp',$id)
        ->get();
        return view('client.sanpham',compact('danhsach'));
    }
}
