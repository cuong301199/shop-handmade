<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SanPhamController extends Controller
{
    //
    public function index(){

        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $id_ch=DB::table('cua_hang')->select('id')->where('id_nd',$id_nd)->first();

        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('cua_hang','cua_hang.id','san_pham.id_ch')
        ->select('san_pham.*','ten_lsp')
        ->where('id_ch',$id_ch->id)
        ->get();
        return view('client.quanly-cuahang.sanpham.index', compact('danhsach'));
    }

    public function create(){
        $danhsach_lsp=DB::table('loai_san_pham')
        ->get();
        $danhsach_dm =DB::table('danh_muc')
        ->get();
        return view('client.quanly-cuahang.sanpham.add', compact('danhsach_lsp','danhsach_dm'));

    }
    public function store(Request $request){
        $tenSanPham = $request->tenSanPham;
        $soLuong =$request->soLuong;
        $giaSanPham = $request->giaSanPham;
        $danhMuc = $request->danhMuc;
        $loaiSanPham = $request->loaiSanPham;
        $moTa = $request->moTa;

        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $id_ch=DB::table('cua_hang')->select('id')->where('id_nd',$id_nd)->first();

        $insert =DB::table('san_pham')->insert(
            [
                'id_ch'=>$id_ch->id,
                'id_lsp'=>$loaiSanPham,
                'ten_sp'=>$tenSanPham,
                'mota_sp'=>$moTa,
                'gia_sp'=>$giaSanPham,
                'soluong_sp'=>$soLuong,
                'id_dm'=>$danhMuc

            ]
            );
            return redirect()->back();
    }

    public function delete($id){
        $id = DB::table('san_pham')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function edit($id){

        $danhsach_dm = DB::table('danh_muc')
        ->get();

        $danhsach_lsp = DB::table('loai_san_pham')
        ->get();

        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('danh_muc','danh_muc.id','san_pham.id_dm')
        ->select('san_pham.*','ten_lsp','ten_dm')
        ->where('san_pham.id',$id)
        ->first();


        return view('client.quanly-cuahang.sanpham.edit', compact('danhsach','danhsach_dm','danhsach_lsp'));


    }

    public function update(Resquest $request, $id){
        $tenSanPham = $request->tenSanPham;
        $soLuong =$request->soLuong;
        $giaSanPham = $request->giaSanPham;
        $danhMuc = $request->danhMuc;
        $loaiSanPham = $request->loaiSanPham;
        $moTa = $request->moTa;

        $update = DB::table('san_pham')->where('id',$id)->update(
            [
                // 'id_ch'=>$id_ch->id,
                'id_lsp'=>$loaiSanPham,
                'ten_sp'=>$tenSanPham,
                'mota_sp'=>$moTa,
                'gia_sp'=>$giaSanPham,
                'soluong_sp'=>$soLuong,
                'id_dm'=>$danhMuc

            ]
        );

        return redirect()->back();

    }





}
