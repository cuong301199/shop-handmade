<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class QuanLyCuaHangController extends Controller
{
    //
    public function index(){
        return view('client.quanly-cuahang.index');
    }

    public function manage_oder(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $oder = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('id_nb',$id_nd)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
                ->get();
            // $danhsach = DB::table('chi_tiet_hoa_don')
            // ->join('hoa_don','hoa_don.id','chi_tiet_hoa_don.id_hd')
            // ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
            // ->where('id_hd',$id)
            // ->get();

        return view('client.quanly-cuahang.donhang.index',compact('oder'));
    }

    public function manage_oder_detail(Request $request,$id){
        $khachhang = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->select('nguoi_dung.*','trang_thai_don_hang.*','hoa_don.*')
        ->where('hoa_don.id',$id)
        ->first();
        $ttvc = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('hoa_don.id',$id)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
                ->first ();

        // $mgg = DB::table('ma_giam_gia')
        // ->join('hoa_don','hoa_don.id_mgg','ma_giam_gia.id')
        // ->where('hoa_don.id',$id)
        // ->first();
        // $tt = DB::table('trang_thai_don_hang')
        // ->get();
        $danhsach = DB::table('chi_tiet_hoa_don')
        ->join('hoa_don','hoa_don.id','chi_tiet_hoa_don.id_hd')
        ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
        ->where('id_hd',$id)
        ->get();
        return view('client.quanly-cuahang.donhang.chitiet-donhang',compact('danhsach','khachhang','ttvc'));
    }

    public function accepOder(Request $request,$id){
        $id_tt = $request->id_tt;
        $update = DB::table('hoa_don')->where('id',$id)->update(
            [
                'id_tt'=>$id_tt,
            ]
        );
        return redirect()->back();
    }

    public function order(){
        $id= Auth::guard('nguoi_dung')->user()->id;
        $oder = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
        ->where('hoa_don.id_nm',$id)
        ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
        ->get();
        $ttvc = DB::table('hoa_don')
        // ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        // ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
        // ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->join('chi_tiet_hoa_don','chi_tiet_hoa_don.id_hd','hoa_don.id')
        ->where('hoa_don.id_nm',$id)
        ->select('chi_tiet_hoa_don.*','hoa_don.*')
        ->groupby('chi_tiet_hoa_don.id_hd')
        ->get();
        $nguoiban = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nb')
        ->first();


        return view('client.quanly-cuahang.donhangdadat.index',compact('oder','ttvc'));
    }

    public function oder_detail(Request $request,$id){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $khachhang = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->select('nguoi_dung.*','trang_thai_don_hang.*','hoa_don.*')
        ->where('hoa_don.id',$id)
        ->first();
        $ttvc = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('hoa_don.id',$id)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
                ->first ();
        $danhsach = DB::table('chi_tiet_hoa_don')
        ->join('hoa_don','hoa_don.id','chi_tiet_hoa_don.id_hd')
        ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
        ->where('id_hd',$id)
        ->get();
        return view('client.quanly-cuahang.donhangdadat.chitiet-donhang',compact('khachhang','ttvc','danhsach'));
    }


}
