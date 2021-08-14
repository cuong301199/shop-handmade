<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoaiSanPhamController extends Controller
{
    public function index(){
        $danhsach = DB::table('danh_muc')
        ->get();
        return view('admin\loaisanpham\add_loaisanpham', compact('danhsach'));
     
    }
    
    public function add_loaisanpham(Request $request){
        $tenLoaiSanPham = $request-> tenLoaiSanPham;
        $tenDanhMuc = $request->tenDanhMuc;

        $insert = DB::table('loai_san_pham')->insert(
            [
                'ten_lsp'=>$tenLoaiSanPham,
                'id_dm'=> $tenDanhMuc
            ]
            );
            echo 'thêm thành công';
    }


    public function show_loaisanpham(){
        // $danhsach = DB::table('loai_san_pham')->get();
        $danhsach = DB::table('loai_san_pham')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->select('ten_dm','ten_lsp','id_dm')
        ->get();
        return view('admin\loaisanpham\show_loaisanpham', compact('danhsach'));
        
    }
    
    // public function show_loaisanpham1(){
    //     // $danhsach = DB::table('loai_san_pham')->get();
    //     $danhsach = DB::table('loai_san_pham')
    //     ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
    //     ->select('ten_dm','ten_lsp','id_dm')
    //     ->get();
    //     return view('admin\loaisanpham\add_loaisanpham', compact('danhsach'));
        
    // }


   

}

