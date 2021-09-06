<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Hash;
class ThongTinCaNhanController extends Controller
{
    public function edit($id){

        $danhsach = DB::table('nguoi_dung')->where('id',$id)->first();
        return view('client.thongtincanhan.profile',compact('danhsach'));
    }

    public function update(Request $request , $id){
        $hoVaTen = $request ->hoVaTen;
        $email = $request ->email;
        $diaChi = $request ->diaChi;
        $soDienThoai = $request ->soDienThoai;

        $update = DB::table('nguoi_dung')->where('id',$id)->update(
            [
                'ten_nd'=>$hoVaTen,
                'email_nd'=>$email,
                'diachi_nd'=>$diaChi,
                'sdt_nd'=>$soDienThoai

            ]);

            return redirect()->back();
    }

    public function editpassword(){

        return view('client.thongtincanhan.changepassword');
    }

    public function updatepassword(Request $request , $id){
        $password  = $request->password;
        $passNew  =$request->passNew;
        $rePassNew = $request -> rePassNew;
        // $pass_old = Auth::guard('nguoi_dung')->user()->password;
        // if($password != $pass_old){
        //     Session::flash("error","Điền sai mật khẩu cũ");
        //     return redirect()->back();
        // };
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
}
