<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class NguoiDungController extends Controller
{
    public function login(){
        return view('client.login');
    }

    public function register(Request $request){
        $tenDangNhap = $request->tenDangNhap;
        $matKhau = $request->matKhau;
        $reMatKhau = $request->reMatKhau;

        if( $matKhau == $reMatKhau){
            $insert = DB::table('nguoi_dung')->insert(
                [
                    'username'=>$tenDangNhap,
                    'password'=>$matKhau
                ]
            );

            return redirect()->back();
        }else{
            dd('bị lỗi');
        }
    }
}
