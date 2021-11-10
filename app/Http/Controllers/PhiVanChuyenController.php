<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class PhiVanChuyenController extends Controller
{
    public function index(){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $danhsach = DB::table('phi_van_chuyen')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','phi_van_chuyen.id_tp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','phi_van_chuyen.id_qh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','phi_van_chuyen.id_xa')
        ->where('id_nd',$id_nd)
        ->get();
        return view("client.quanly-cuahang.phivanchuyen.index",\compact('danhsach'));
    }

    public function create(){
        $tp = DB::table('tbl_tinhthanhpho')->get();
        $qh = DB::table('tbl_quanhuyen')->get();
        $xp = DB::table('tbl_xaphuongthitran')->get();
        return view('client.quanly-cuahang.phivanchuyen.add',\compact('tp','qh','xp'));
    }
    public function getProvinceByCity($idCity){
        $qh= DB::table('tbl_quanhuyen')->where('matp',$idCity)->get();
        return response()->json($qh, 200);
    }
    public function getWardsByProvince($idProvince){
        $xp= DB::table('tbl_xaphuongthitran')->where('maqh',$idProvince)->get();
        return response()->json($xp, 200);
    }
    public function store(Request $request ){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $thanhPho = $request->thanhPho;
        $quanHuyen = $request->quanHuyen;
        $xaPhuong = $request->xaPhuong;
        $phiVanChuyen = $request->phiVanChuyen;

        $insert = DB::table('phi_van_chuyen')->insert(
                [
                    'id_tp'=>$thanhPho,
                    'id_qh'=>$quanHuyen,
                    'id_xa'=>$xaPhuong,
                    'id_nd'	=>$id_nd ,
                    'phi_pvc'=> $phiVanChuyen
                ]
            );
        session::flash('success', "Thêm phí vận chuyển thành công");
        return \redirect()->route('phivanchuyen.index');
    }


}
