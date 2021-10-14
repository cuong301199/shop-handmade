<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Cart;
class ThanhToanController extends Controller
{
    public function index(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $nguoidung = DB::table('nguoi_dung')->where('id',$id_nd)->first();
        return view('client.thanhtoan',compact('nguoidung'));
    }
    public function store(Request $request, $id){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $ghiChu =$request->ghiChu;
        $phuongThucThanhToan = $request->phuongThucThanhToan;
        $tong_sp = $request->tong_sp;
        $diaChi = $request->diaChi;
        $tongTien = $request->tong_tien;

        $inserth = DB::table('hoa_don')->insertGetId(
            [
                'id_nd'=>$id_nd,
                'id_ch'=>$id,
                'ghi_chu'=>$ghiChu,
                'phuong_thuc_thanh_toan'=>$phuongThucThanhToan,
                'tong_sp'=> $tong_sp,
                'dia_chi'=>$diaChi,
                'tong_tien'=>$tongTien
            ]
        );

        foreach(Cart::content()->groupBy('options.id_ch') as $key => $value){
            if($key==$id){
                foreach($value as $item){
                    $insert = DB::table('chi_tiet_hoa_don')->insert(
                        [
                            'id_hd'=>$inserth,
                            'id_nd'=>$id_nd,
                            'id_sp'=>$item->id,
                            'id_ch'=>$key,
                            'so_luong'=>$item->qty,
                            'gia_sp'=>$item->price
                        ]
                    );

                }
            }
        }

        Session::flash("success", "Đặt hàng thành công");
        return redirect()->route('checkout.index');

    }

    public function thanhToan(){
        return view('client.cart-demo');
    }
}
