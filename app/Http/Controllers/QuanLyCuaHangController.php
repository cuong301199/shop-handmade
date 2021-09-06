<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class QuanLyCuaHangController extends Controller
{
    //
    public function index(){
        return view('client.quanly-cuahang.index');
    }


}
