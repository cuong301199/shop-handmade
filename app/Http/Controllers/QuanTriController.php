<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class QuanTriController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function user(){
        $danhsach= DB::table('nguoi_dung')
        ->get();
        return view('admin.nguoidung.index',compact('danhsach'));
    }
    public function postLogin(Request $request){
        $arr=[
            'username'=>$request->tenDangNhap,
            'password'=>$request->matKhau
        ];
        if(Auth::guard('quan_tri')->attempt($arr)){

            return redirect()->route('admin.index');

        }else{
            dd('đăng nhập thất bại');
        }
    }

    public function logOut(){
        Auth::guard('quan_tri')->logout();
        return redirect()->route('admin.login');

    }
}
