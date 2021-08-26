<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
class NguoiDungController extends Controller
{
    public function login(){
        return view('client.login');
    }

    public function register(Request $request){
        $tenDangNhap = $request->tenDangNhap;
        $matKhau = $request->matKhau;
        $reMatKhau = $request->reMatKhau;
        $email = $request->email;
        $hoTen= $request->hoTen;

        if( $matKhau == $reMatKhau){

            $hashPassword = Hash::make($matKhau);
            $insert = DB::table('nguoi_dung')->insert(
                [
                    'username'=>$tenDangNhap,
                    'password'=> $hashPassword,
                    'ten_nd'=>$hoTen,
                    'email_nd'=>$email,
                ]
            );

            return redirect()->back();
        }else{
            dd('bị lỗi');
        };
    }

    public function postLogin(Request $request){
        $arr = [
            'username'=> $request->tenDangNhap,
            'password'=>$request->matKhau
        ];
        if(Auth::guard('nguoi_dung')->attempt($arr)){

            return redirect()->route('client.index');

        }else{
            dd('đăng nhập thất bại');
        }
    }


    public function logOut(){
        Auth::guard('nguoi_dung')->logout();
        return redirect()->route('nguoidung.login');
    }
}
