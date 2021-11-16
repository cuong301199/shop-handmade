<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DanhMucController extends Controller
{

    public function index(Request $request){
        $key = $request-> key;
        $danhsachdanhmuc1 = DB::table('danh_muc');
        $danhsachdanhmuc = $danhsachdanhmuc1->paginate(8);
        if($key){
            $danhsachdanhmuc = $danhsachdanhmuc1->where('ten_dm','like','%'.$key.'%')->paginate(8);
        }
        return view('admin.danhmuc.index', compact('danhsachdanhmuc'));
    }

    public function create(){
        return view('admin.danhmuc.add');
    }

    public function store(Request $request){
        $tenDanhMuc = $request->tenDanhMuc;
        $moTa = $request->moTa;

        if($request->hasFile('hinhAnh')){
            $hinhAnh = $request->file('hinhAnh');
            $tenFile = $hinhAnh->getClientOriginalName();

            $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());

            $insert = DB::table('danh_muc')->insert(
                [
                    'ten_dm'=> $tenDanhMuc,
                    'mota_dm'=>$moTa,
                    'hinhanh_dm'=>'hinh-anh-san-pham/'.$hinhAnh->getClientOriginalName()
                ]
            );
        }
        return redirect()->route('danhmuc.index');

    }

    public function delete($id){
        DB::table('danh_muc')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $danhmuc = DB::table('danh_muc')->where('id', $id)->first();
        return view('admin.danhmuc.edit', compact('danhmuc'));
    }

    public function update(Request $request, $id){
        $tenDanhMuc = $request->tenDanhMuc;
        $moTa = $request->moTa;

        $update = DB::table('danh_muc')->where('id', $id)->update(
            [
                'ten_dm'=> $tenDanhMuc,
                'mota_dm'=>$moTa
            ]
            );
            if($request->hasFile('hinhAnh')){
                $hinhAnh = $request->file('hinhAnh');
                $tenFile = $hinhAnh->getClientOriginalName();
                $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());

                $updateHinhAnh = DB::table('danh_muc')->where('id',$id)->update(
                    [
                        'hinhanh_dm'=>'hinh-anh-san-pham/'.$tenFile
                    ]
                );

            }
        return redirect()->route('danhmuc.index');

    }

}
