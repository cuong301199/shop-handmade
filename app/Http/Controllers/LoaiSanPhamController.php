<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Resquest;

class LoaiSanPhamController extends Controller
{
    public function index(){
        $danhsach_lsp = DB::table('loai_san_pham')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        // ->select('ten_dm','ten_lsp','id_dm',)
        ->select('loai_san_pham.*','ten_dm','ten_lsp','id_dm')
        ->paginate(8);
         return view('admin.loaisanpham.index', compact('danhsach_lsp'));


    }

    public function create(){
        $danhsach = DB::table('danh_muc')
        ->get();
        return view('admin.loaisanpham.add', compact('danhsach'));

    }

    public function store(Request $request){
        $tenLoaiSanPham = $request-> tenLoaiSanPham;
            $tenDanhMuc = $request->tenDanhMuc;

            $insert = DB::table('loai_san_pham')->insert(
                [
                    'ten_lsp'=>$tenLoaiSanPham,
                    'id_dm'=> $tenDanhMuc
                ]
                );
                return redirect()->route('loaisanpham.index');
    }




    public function delete($id){
        $id=  DB::table('loai_san_pham')->where('id',$id)->delete();
         return redirect()->back();
     }

    public function edit($id){
        // $danhsach_lsp = DB::table('loai_san_pham')->where('id', $id)->first();
        // $danhsach = DB::table('danh_muc')->get();
        $danhsach = DB::table('danh_muc')
        ->get();

        $danhsach_lsp = DB::table('loai_san_pham')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->select('loai_san_pham.*','ten_dm')
        ->where('loai_san_pham.id', $id)
        ->first();
        return view('admin.loaisanpham.edit', compact('danhsach','danhsach_lsp'));
    }

    public function update(Request $request, $id){
        $tenLoaiSanPham = $request->tenLoaiSanPham;
        $tenDanhMuc = $request->tenDanhMuc;

        $update = DB::table('loai_san_pham')->where('id', $id)->update(
            [
                'ten_lsp' => $tenLoaiSanPham,
                'id_dm' => $tenDanhMuc

            ]

            );
            return redirect()->route('loaisanpham.index');
    }
}
