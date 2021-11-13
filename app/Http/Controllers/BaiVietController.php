<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;
use Session;
use File;
class BaiVietController extends Controller
{
    public function index(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $danhsach =  DB::table('bai_viet')
        ->where('id_nd', $id_nd)
        ->paginate(6);
        return view('client.quanly-cuahang.baiviet.index',\compact('danhsach'));
    }
    public function create(){
        return view('client.quanly-cuahang.baiviet.add');
    }

    public function store(Request $request){
        $tieude_bv = $request->tieude_bv;
        $tomtat_bv = $request->tomtat_bv;
        $noidung_bv = $request->noidung_bv;
        $id_nd= Auth::guard('nguoi_dung')->user()->id;

        if($request->hasFile('hinhanh_bv')){
            $hinhAnh = $request->file('hinhanh_bv');
            $tenFile = $hinhAnh->getClientOriginalName();

            $hinhAnh->move(public_path('hinh-anh-bai-viet/'), $hinhAnh->getClientOriginalName());

            $insert =DB::table('bai_viet')->insertGetId(
                [
                    'id_nd'=>$id_nd,
                    'tieude_bv'=>$tieude_bv,
                    'noidung_bv'=>$noidung_bv ,
                    'tomtat_bv'=>$tomtat_bv,
                    'hinhanh_bv'=>'hinh-anh-bai-viet/'.$hinhAnh->getClientOriginalName(),
                    'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
                ]
                );
        }
            Session::flash("success","Thêm thành công");
            return redirect()->route('baiviet.index');
    }

    public function edit($id){

        $danhsach = DB::table('bai_viet')
        ->where('bai_viet.id',$id)
        ->first();
        return view('client.quanly-cuahang.baiviet.edit', compact('danhsach'));


    }
    public function update(Request $request, $id){
        $tieude_bv = $request->tieude_bv;
        $tomtat_bv = $request->tomtat_bv;
        $noidung_bv = $request->noidung_bv;
        $update = DB::table('bai_viet')->where('id',$id)->update(
            [
                'tieude_bv'=>$tieude_bv,
                'noidung_bv'=>$noidung_bv ,
                'tomtat_bv'=>$tomtat_bv,
            ]
        );

        if($request->hasFile('hinhanh_bv')){
            $hinhAnh = $request->file('hinhanh_bv');
            $tenFile = $hinhAnh->getClientOriginalName();
            $hinhAnh->move(public_path('hinh-anh-bai-viet/'), $hinhAnh->getClientOriginalName());

            $updateHinhAnh = DB::table('bai_viet')->where('id',$id)->update(
                [
                    'hinhanh_bv'=>'hinh-anh-bai_viet/'.$tenFile
                ]
            );

        }


        Session::flash("success","Sửa thành công");
        return redirect()->back();
    }

    public function delete($id){
        $id = DB::table('bai_viet')->where('id',$id)->delete();

        Session::flash("success","Xóa thành công");
        return redirect()->back();
    }

    public function load_comment(Request $request, $id_bv){
        $comment = DB::table('binh_luan')
        ->join('nguoi_dung','nguoi_dung.id','binh_luan.id_nd')
        // ->join('table_phan_hoi','table_phan_hoi.id_bl','binh_luan.id')
        ->where('binh_luan.id_bv',$id_bv)
        ->orderBy('binh_luan.id','desc')
        ->select('nguoi_dung.*','binh_luan.*')
        ->get();
        return response()->json($comment, 200);
    }

    public function comment(Request $request, $id_bv){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $noidung_bl = $request->noidung_bl;
        $insert = DB::table('binh_luan')->insert(
            [
                'id_nd'=>$id_nd,
                'id_bv'=>$id_bv,
                'noidung_bl'=>$noidung_bl,
                'created_at'=> Carbon::now('Asia/Ho_Chi_Minh') ,
            ]);
    }
}
