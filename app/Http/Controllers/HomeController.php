<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        $danhsachsanpham = DB::table('san_pham')
        ->select('san_pham.*')
        ->get();
        return view('client.index',compact('danhsachsanpham'));
    }
    public function searchProduct(Request $request){
        $key=$request->search;
        $search_product = DB::table('san_pham')->where('ten_sp','like','%'.$key.'%')->get();
        return view('client.timkiem',compact('search_product'));
    }
}
