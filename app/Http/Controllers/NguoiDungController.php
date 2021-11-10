<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use Socialite;
use Session;
use Carbon\Carbon;
class NguoiDungController extends Controller
{

    public function getInfor()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        $infor =Socialite::driver('facebook')->user();
        dd($infor);
    }

    public function login()
    {
        $danhmuc = DB::table('danh_muc')
        ->get();
        return view('client.login',\compact('danhmuc'));
    }

    public function register(Request $request)
    {
        $tenDangNhap = $request->tenDangNhap;
        $matKhau = $request->matKhau;
        $reMatKhau = $request->reMatKhau;
        $email = $request->email;
        $hoTen= $request->hoTen;
        $soDienThoai = $request->soDienThoai;


        if($tenDangNhap=="" || $tenDangNhap == null ){
            Session::flash("error", "Tên đăng nhập không được để trống");
            return redirect()->back();
        }
        if($matKhau=="" || $matKhau == null ){
            Session::flash("error", "Mật khẩu không được để trống");
            return redirect()->back();
        }if($email=="" || $email == null ){
            Session::flash("error", "Email không được để trống");
            return redirect()->back();
        }if($hoTen=="" || $hoTen == null ){
            Session::flash("error", "Họ tên không được để trống");
            return redirect()->back();
        }

        $checkUsername = DB::table('nguoi_dung')->where('username',$tenDangNhap)->count();
        if($checkUsername > 0){
            Session::flash("error", "Tên đăng nhập đã có người sử dụng");
            return redirect()->back();
        }
        // $checkEmail = DB::table('nguoi_dung')->where('email_nd',$email)->count();
        // if($checkEmail > 0){
        //     Session::flash("error", "Email đã có người sử dụng");
        //     return redirect()->back();
        // }

        if( $matKhau == $reMatKhau){

            $hashPassword = Hash::make($matKhau);
            $insert = DB::table('nguoi_dung')->insert(
                [
                    'username'=>$tenDangNhap,
                    'password'=> $hashPassword,
                    'ten_nd'=>$hoTen,
                    'email_nd'=>$email,
                    'sdt_nd'=>$soDienThoai,
                    'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
                ]
            );

            Session::flash("success", "Đăng kí thành công");
            return redirect()->back();
        }else{
            Session::flash("error", "Mật khẩu không trùng khớp");
            return redirect()->back();

        };
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'username'=> $request->tenDangNhap,
            'password'=>$request->matKhau
        ];
        if(Auth::guard('nguoi_dung')->attempt($arr)){

            return redirect()->route('client.index');
        }else{
            Session::flash("error-login", "Sai tên đăng nhập hoặc mật khẩu");
            return redirect()->back();
        }
    }



    public function logOut(){
        Auth::guard('nguoi_dung')->logout();
        return redirect()->route('nguoidung.login');
    }
}
