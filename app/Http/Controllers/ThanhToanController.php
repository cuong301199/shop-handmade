<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
class ThanhToanController extends Controller
{
    public function index(){
        $cart = Session::get('Cart');
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $nguoidung = DB::table('nguoi_dung')->where('id',$id_nd)->first();
        return view('client.thanhtoan',compact('nguoidung'));
    }
    public function store(Request $request){
        $cart = Session::get('Cart');
        $diaChi = $request->diaChi;
        $ghiChu =$request->ghiChu;
        $tongTien = $request->tongTien;


        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        foreach ($cart ->products as $key) {
                $insert =DB::table('hoa_don')->insertGetId(
                    [
                        'id_nd'=>$id_nd,
                        'id_ch'=>$key["productInfor"]->id_ch,
                        'ghi_chu'=>$ghiChu,
                        'tong_tien'=>$tongTien,
                        'dia_chi'=>$diaChi,
                        'tong_tien'=>$cart->totalPrice,
                        'tong_sp'=>$cart->totalQuanty,

                    ]);
        }
        foreach ($cart ->products as $key) {
            $insert =DB::table('chi_tiet_hoa_don')->insert(
                [
                    'id_nd'=>$id_nd,
                    'id_ch'=>$key["productInfor"]->id_ch,
                    'id_sp'=>$key["productInfor"]->id,
                    'id_hd'=>$insert,
                    'so_luong'=>$key['quanty'],
                ]);
    }


        if($insert){
           dd('thah cong');
        }else{
            dd('ko thanh cong');
        }
    }

    public function thanhToan(){
        return view('client.cart-demo')
;    }
}