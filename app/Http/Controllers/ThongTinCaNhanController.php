<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Hash;
use File;
class ThongTinCaNhanController extends Controller
{
    public function edit($id){

        $danhsach = DB::table('nguoi_dung')->where('id',$id)->first();
        return view('client.thongtincanhan.profile',compact('danhsach'));
    }

    public function update(Request $request , $id){
        $hoVaTen = $request ->hoVaTen;
        $email = $request ->email;
        // $diaChi = $request ->diaChi;
        $soDienThoai = $request ->soDienThoai;

        $update = DB::table('nguoi_dung')->where('id',$id)->update(
            [
                'ten_nd'=>$hoVaTen,
                'email_nd'=>$email,
                // 'diachi_nd'=>$diaChi,
                'sdt_nd'=>$soDienThoai,


            ]);
            if($request->hasFile('anhdaidien_nd')){
                $hinhAnh = $request->File('anhdaidien_nd');
                        $tenFile =  $hinhAnh->getClientOriginalName();
                        $hinhAnh->move(public_path('anh-dai-dien/'), $hinhAnh->getClientOriginalName());
                        $insertHinhAnh = DB::table('nguoi_dung')->where('id',$id)->update(
                            [

                                'anhdaidien_nd'=>'anh-dai-dien/'. $hinhAnh->getClientOriginalName()
                            ]
                        );
                }
            return redirect()->back();
    }

    public function editpassword(){

        return view('client.thongtincanhan.changepassword');
    }

    public function updatepassword(Request $request , $id){
        $password  = $request->pass;
        $passNew  =$request->passNew;
        $rePassNew = $request -> rePassNew;

        $pass_old = Auth::guard('nguoi_dung')->user()->password;


        if(!Hash::check($password, $pass_old)){

            Session::flash("error","Điền sai mật khẩu cũ");
            return redirect()->back();
        };
        if($passNew != $rePassNew){
            Session::flash("error","Mật khẩu mới không giống nhau");
            return redirect()->back();
        }

        if( $passNew == $rePassNew){
        $hashPassword = Hash::make($passNew);
        $update =DB::table('nguoi_dung')->where('id',$id)->update(
            [
                'password' => $hashPassword,
            ]
         );
         Session::flash("success","Đổi mật khẩu thành công");
         return redirect()->back();
       }


    }
    public function order(){
        $id= Auth::guard('nguoi_dung')->user()->id;
        $khachhang = DB::table('hoa_don')
        ->join('chi_tiet_hoa_don','chi_tiet_hoa_don.id_hd','hoa_don.id')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->where('hoa_don.id_nm',$id)
        ->select('chi_tiet_hoa_don.*','trang_thai_don_hang.*','hoa_don.*')
        ->get();
        return view('client.thongtincanhan.donhang.donhang',\compact('khachhang'));
    }

    public function oder_detail($id){
        $khachhang = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nb')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->select('nguoi_dung.*','trang_thai_don_hang.*','hoa_don.*')
        ->where('hoa_don.id',$id)
        ->first();
        $ttvc = DB::table('hoa_don')
        ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xa')
        ->where('hoa_don.id',$id)
        ->first();
        return view('client.thongtincanhan.donhang.chitietdonhang',\compact('khachhang'));
    }
}

