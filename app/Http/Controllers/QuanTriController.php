<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
class QuanTriController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function user(){
        $danhsach= DB::table('nguoi_dung')
        ->paginate(8);
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

    public function manage_chars_user(){
        return view('admin.thongke-nguoidung.index');
    }
    public function manage_chars_user_30day(){
        $now =   $now = Carbon::now('Asia/Ho_Chi_Minh');
        $sub30days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(30);
         $danhsach = DB::table('nguoi_dung')
        ->whereBetween('created_at',[$sub30days,$now])
        ->select('created_at',DB::raw('count(id) as nguoi_dung'))
        ->groupBy('created_at')
       ->get();

       foreach($danhsach as $key => $val){
        $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
            $data[]=array(
                'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                'nguoi_dung'=>$val->nguoi_dung
                );
            }
        return response()->json($data, 200);
    }

    public function filter_by_date_user(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $danhsach = DB::table('nguoi_dung')
        ->whereBetween('created_at',[$from_date, $to_date])
        ->select('created_at',DB::raw('count(id) as nguoi_dung'))
        ->groupBy('created_at')
       ->get();

       foreach($danhsach as $key => $val){
        $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
            $data[]=array(
                'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                'nguoi_dung'=>$val->nguoi_dung
                );
            }
        return response()->json($data, 200);
    }

    public function filter_dashboard_user(Request $request){
        $filter = $request->filter;
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $sub7days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(7);

        $sub30days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(30);

        $sub365days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(355);

        $dau_thangtruoc =   Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth();

        $cuoi_thangtruoc =   Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth();

        $dau_thangnay =  Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth();

        if($filter == 'thangnay'){
            $danhsach = DB::table('nguoi_dung')
            ->whereBetween('created_at',[$dau_thangnay, $now])
            ->select('created_at',DB::raw('count(id) as nguoi_dung'))
            ->groupBy('created_at')
           ->get();

           foreach($danhsach as $key => $val){
            $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                $data[]=array(
                    'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                    'nguoi_dung'=>$val->nguoi_dung
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }elseif($filter == '7truoc'){
            $danhsach = DB::table('nguoi_dung')
            ->whereBetween('created_at',[ $sub7days, $now])
            ->select('created_at',DB::raw('count(id) as nguoi_dung'))
            ->groupBy('created_at')
           ->get();

           foreach($danhsach as $key => $val){
            $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                $data[]=array(
                    'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                    'nguoi_dung'=>$val->nguoi_dung
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }elseif($filter == '30truoc'){
            $danhsach = DB::table('nguoi_dung')
            ->whereBetween('created_at',[$sub30days, $now])
            ->select('created_at',DB::raw('count(id) as nguoi_dung'))
            ->groupBy('created_at')
           ->get();

           foreach($danhsach as $key => $val){
            $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                $data[]=array(
                    'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                    'nguoi_dung'=>$val->nguoi_dung
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }else{
            $danhsach = DB::table('nguoi_dung')
            ->whereBetween('created_at',[$sub365days,$now])
            ->select('created_at',DB::raw('count(id) as nguoi_dung'))
            ->groupBy('created_at')
           ->get();

           foreach($danhsach as $key => $val){
            $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                $data[]=array(
                    'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                    'nguoi_dung'=>$val->nguoi_dung
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);

        }
    }
}
