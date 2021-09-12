<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use File;
class SanPhamController extends Controller
{
    //
    public function index(){

        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $id_ch=DB::table('cua_hang')->select('id')->where('id_nd',$id_nd)->first();

        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('cua_hang','cua_hang.id','san_pham.id_ch')
        ->join('hinh_anh','hinh_anh.id_sp','san_pham.id')
        ->where('id_ch',$id_ch->id)
        ->get();
        return view('client.quanly-cuahang.sanpham.index', compact('danhsach'));
    }

    public function create(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $id_ch=DB::table('cua_hang')->select('id')->where('id_nd',$id_nd)->first();

        $danhsach_lsp=DB::table('loai_san_pham')
        ->get();
        $danhsach_dm =DB::table('cuahang_danhmuc')
        ->join('danh_muc','danh_muc.id','cuahang_danhmuc.id_dm')
        ->select('cuahang_danhmuc.*','ten_dm')
        ->where('cuahang_danhmuc.id_ch',$id_ch->id)
        ->get();
        return view('client.quanly-cuahang.sanpham.add', compact('danhsach_lsp','danhsach_dm'));

    }
    public function store(Request $request){
        $tenSanPham = $request->tenSanPham;
        $soLuong =$request->soLuong;
        $giaSanPham = $request->giaSanPham;
        $danhMuc = $request->danhMuc;
        $loaiSanPham = $request->loaiSanPham;
        $moTa = $request->moTa;

        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $id_ch=DB::table('cua_hang')->select('id')->where('id_nd',$id_nd)->first();

        $insert =DB::table('san_pham')->insertGetId(
            [
                'id_ch'=>$id_ch->id,
                'id_lsp'=>$loaiSanPham,
                'ten_sp'=>$tenSanPham,
                'mota_sp'=>$moTa,
                'gia_sp'=>$giaSanPham,
                'soluong_sp'=>$soLuong,
                'id_dm'=>$danhMuc

            ]
            );

            if($request->hasFile('hinhAnh')){
                $hinhAnh = $request->file('hinhAnh');
                $tenFile = $hinhAnh->getClientOriginalName();

                $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());
                $insertHinhAnh = DB::table('hinh_anh')->insert(
                    [
                        'id_sp'=>$insert,
                        'diachi_ha'=>'hinh-anh-san-pham/'.$hinhAnh->getClientOriginalName()
                    ]
                );
            }

            Session::flash("success","Thêm thành công");
            return redirect()->route('sanpham.index');
    }


    public function getProductTypeByCat($idCat){
        $danhsach = DB::table('loai_san_pham')->where('id_dm', $idCat)->get();
        return response()->json($danhsach, 200);
    }

    public function delete($id){
        $hinhAnh= DB::table('hinh_anh')->where('id_sp',$id)->get();
        foreach($hinhAnh as $item){
           File::delete($item->diachi_ha);
        }


        $id = DB::table('san_pham')->where('id',$id)->delete();

        Session::flash("success","Xóa thành công");
        return redirect()->back();
    }

    public function edit($id){

        $danhsach_dm = DB::table('danh_muc')
        ->get();

        $danhsach_lsp = DB::table('loai_san_pham')
        ->get();

        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('hinh_anh','hinh_anh.id_sp','san_pham.id')
        ->join('danh_muc','danh_muc.id','san_pham.id_dm')
        ->where('san_pham.id',$id)
        ->first();


        return view('client.quanly-cuahang.sanpham.edit', compact('danhsach','danhsach_dm','danhsach_lsp'));


    }

    public function update(Request $request, $id){
        $tenSanPham = $request->tenSanPham;
        $soLuong =$request->soLuong;
        $giaSanPham = $request->giaSanPham;
        $danhMuc = $request->danhMuc;
        $loaiSanPham = $request->loaiSanPham;
        $moTa = $request->moTa;

        $update = DB::table('san_pham')->where('id',$id)->update(
            [
                // 'id_ch'=>$id_ch->id,
                'id_lsp'=>$loaiSanPham,
                'ten_sp'=>$tenSanPham,
                'mota_sp'=>$moTa,
                'gia_sp'=>$giaSanPham,
                'soluong_sp'=>$soLuong,
                'id_dm'=>$danhMuc

            ]
        );

        if($request->hasFile('hinhAnh')){
            $hinhAnh = $request->file('hinhAnh');
            $tenFile = $hinhAnh->getClientOriginalName();
            $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());
            $hinhAnhHienTai=$request->hinhAnhHienTai;
            $updateHinhAnh = DB::table('hinh_anh')->where('id_sp',$id)->update(
                [
                    'diachi_ha'=>'hinh-anh-san-pham/'.$tenFile
                ]
            );
        }
        if(!empty($hinhAnhHienTai)){
           File::delete( $hinhAnhHienTai);
        }

        Session::flash("success","Sửa thành công");
        return redirect()->route('sanpham.index');

    }





}
