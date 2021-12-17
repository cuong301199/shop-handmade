<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class MaGiamGiaController extends Controller
{
    //
    public function index(){
        $danhsach = DB::table('ma_giam_gia')->get();
        return view('admin.magiamgia.index',compact('danhsach'));
    }

    public function create(){
        return view('admin.magiamgia.add');

    }
    public function store(Request $request){
        $tenMaGiamGia=$request->tenMaGiamGia;
        $maGiamGia = $request->maGiamGia;
        $dieuKienGiam = $request->dieuKienGiam;
        $giaTriGiam = $request->giaTriGiam;

        $insert = DB::table('ma_giam_gia')->insert(
            [
                'ten_mgg'=>$tenMaGiamGia,
                'ma_mgg'=> $maGiamGia,
                'dieukien_mgg'=>$dieuKienGiam,
                'giatri_mgg'=> $giaTriGiam,
            ]
        );
        if($insert){
            Session::flash('success',"Thêm mã giảm giá thành công");
            return \redirect()->route('coupon.index');
        }

    }

    public function delete($id){
        $delete = DB::table('ma_giam_gia')->where('id', $id)->delete();
        if($delete){
            Session::flash('delete-success',"xóa thành công");
            return \redirect()->back();
        }
    }
}
