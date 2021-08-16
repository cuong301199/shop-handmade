<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DanhMucController extends Controller
{

    public function index(){
        $danhsachdanhmuc = DB::table('danh_muc')->get();
        return view('admin.danhmuc.index', compact('danhsachdanhmuc'));
    }

    public function create(){
        return view('admin.danhmuc.add');
    }
   
    public function store(Request $request){
        $tenDanhMuc = $request->tenDanhMuc;
        $moTa = $request->moTa;
       

        $insert = DB::table('danh_muc')->insert(
            [
                'ten_dm'=> $tenDanhMuc,
                'mota_dm'=>$moTa
            ]
        );

        return redirect()->route('danhmuc.index');

    }

    public function delete($id){
        DB::table('danh_muc')->where('id', $id)->delete();
        return redirect()->back();
    }

}
