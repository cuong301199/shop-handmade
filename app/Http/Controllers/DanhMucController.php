<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DanhMucController extends Controller
{

    public function show_danhmuc(){
        $danhsachdanhmuc = DB::table('danh_muc')->get();
        return view('admin\danhmuc\show_danhmuc', compact('danhsachdanhmuc'));
    }


    public function index(){
        return view('admin\danhmuc\add_danhmuc');
    }
    public function add_danhmuc(Request $request){
        $tenDanhMuc = $request->tenDanhMuc;
        $moTa = $request->moTa;
       

        $insert = DB::table('danh_muc')->insert(
            [
                'ten_dm'=> $tenDanhMuc,
                'mota_dm'=>$moTa
            ]
        );

        echo 'them thanh cong';

    }

}
