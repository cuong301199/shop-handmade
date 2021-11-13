<?php

namespace App\Http\Controllers;
// use App\Support\Collection;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use File;
use Carbon\Carbon;
class SanPhamController extends Controller
{
    //
    public function index(){

        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $danhsach = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('nguoi_dung','nguoi_dung.id','san_pham.id_nb')
        ->join('trang_thai_san_pham','trang_thai_san_pham.id','san_pham.id_trangthai')
        ->where('id_nb',$id_nd)
        ->where('id_trangthai','<>',3)
        ->select('san_pham.*','trang_thai_san_pham.*','loai_san_pham.*','san_pham.id')
        ->paginate(6);
        return view('client.quanly-cuahang.sanpham.index', compact('danhsach'));
    }

    public function create(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $danhsach_lsp=DB::table('loai_san_pham')
        ->get();
        $danhsach_dm =DB::table('danh_muc')
        ->get();
        $tp = DB::table('tbl_tinhthanhpho')
        ->get();
        return view('client.quanly-cuahang.sanpham.add', compact('danhsach_lsp','danhsach_dm','tp'));

    }
    public function store(Request $request){
        $tenSanPham = $request->tenSanPham;
        $giaSanPham = $request->giaSanPham;
        $loaiSanPham = $request->loaiSanPham;
        $moTa = $request->moTa;
        $thanhPho = $request->thanhPho;
        $quanHuyen = $request->quanHuyen;
        $xaPhuong = $request->xaPhuong;
        $id_nd= Auth::guard('nguoi_dung')->user()->id;

        if($request->hasFile('hinhAnh')){
            $hinhAnh = $request->file('hinhAnh');
            $tenFile = $hinhAnh->getClientOriginalName();

            $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());

            $insert =DB::table('san_pham')->insertGetId(
                [
                    'id_nb'=>$id_nd,
                    'id_lsp'=>$loaiSanPham,
                    'ten_sp'=>$tenSanPham,
                    'mota_sp'=>$moTa,
                    'gia_sp'=>$giaSanPham,
                    'id_tp'=> $thanhPho,
                    'id_qh'=>$quanHuyen,
                    'id_xa'=> $xaPhuong,
                    'id_trangthai'=>1,
                    'hinhanh_sp'=>'hinh-anh-san-pham/'.$hinhAnh->getClientOriginalName(),
                    'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
                ]
                );
        }
            // if($request->hasFile('hinhAnh')){
            //     $hinhAnh = $request->file('hinhAnh');
            //     $tenFile = $hinhAnh->getClientOriginalName();

            //     $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());
            //     $insertHinhAnh = DB::table('hinh_anh')->insert(
            //         [
            //             'id_sp'=>$insert,
            //             'avatar_ha'=>'hinh-anh-san-pham/'.$hinhAnh->getClientOriginalName()
            //         ]
            //     );
            // }
            if($request->hasFile('hinhAnhChiTiet')){
                $hinhAnh = $request->File('hinhAnhChiTiet');

                foreach($hinhAnh as $file){
                    if(isset($file)){
                        $tenFile = $file->getClientOriginalName();
                        $file->move(public_path('hinh-anh-san-pham/'), $file->getClientOriginalName());
                        $insertHinhAnh = DB::table('hinh_anh')->insert(
                            [
                                'id_sp'=>$insert,
                                'duongdan_ha'=>'hinh-anh-san-pham/'.$file->getClientOriginalName()
                            ]
                        );

                    }
                }
            }
            else{
                Session::flash("error","Thiếu hình ảnh sản phẩm");
                return redirect()->route('sanpham.create');
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
           File::delete($item->duongdan_ha);
        }
        $avatar_sp = DB::table('san_pham')->where('id', $id)->first();
        if(isset($avatar_sp)){
            File::delete($avatar_sp->hinhanh_sp);
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
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->where('san_pham.id',$id)
        ->select('loai_san_pham.*','danh_muc.*','san_pham.*')
        ->first();

        $hinhanh = DB::table('hinh_anh')
        ->where('id_sp',$id)
        ->get();

        return view('client.quanly-cuahang.sanpham.edit', compact('danhsach','danhsach_dm','danhsach_lsp','hinhanh'));


    }

    public function update(Request $request, $id){
        $tenSanPham = $request->tenSanPham;
        $giaSanPham = $request->giaSanPham;
        $loaiSanPham = $request->loaiSanPham;
        $moTa = $request->moTa;
        $id_trangthai = $request->id_trangthai;
        $update = DB::table('san_pham')->where('id',$id)->update(
            [
                'id_trangthai'=>$id_trangthai,
                'id_lsp'=>$loaiSanPham,
                'ten_sp'=>$tenSanPham,
                'mota_sp'=>$moTa,
                'gia_sp'=>$giaSanPham,
            ]
        );

        if($request->hasFile('hinhAnh')){
            $hinhAnh = $request->file('hinhAnh');
            $tenFile = $hinhAnh->getClientOriginalName();
            $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());

            $updateHinhAnh = DB::table('san_pham')->where('id',$id)->update(
                [
                    'hinhanh_sp'=>'hinh-anh-san-pham/'.$tenFile
                ]
            );
            $hinhAnhHienTai=$request->hinhAnhHienTai;
            if(!empty($hinhAnhHienTai)){
                File::delete( $hinhAnhHienTai);
            }
        }
        // if($request->hasFile('hinhAnhChiTiet')){
        //     $hinhAnh = $request->File('hinhAnhChiTiet');
        //     foreach($hinhAnh as $file){
        //         if(isset($file)){
        //             $tenFile = $file->getClientOriginalName();
        //             $file->move(public_path('hinh-anh-san-pham/'), $file->getClientOriginalName());
        //             $insertHinhAnh = DB::table('hinh_anh')->insert(
        //                 [
        //                     'id_sp' =>$id,
        //                     'duongdan_ha'=>'hinh-anh-san-pham/'.$file->getClientOriginalName()
        //                 ]
        //             );
        //         }
        //     }
        // }
        if($request->hasFile('hinhAnhChiTiet')){
            $hinhAnh = $request->file('hinhAnhChiTiet');
            $tenFile = $hinhAnh->getClientOriginalName();
            $hinhAnh->move(public_path('hinh-anh-san-pham/'), $hinhAnh->getClientOriginalName());
            $insertHinhAnh = DB::table('hinh_anh')->insert(
                [
                    'id_sp' =>$id,
                    'duongdan_ha'=>'hinh-anh-san-pham/'.$tenFile
                ]
                );
            }
        Session::flash("success","Sửa thành công");
        return redirect()->back();
    }

    public function deleteImage($id){
        $delete = DB::table('hinh_anh')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function getProductByCat(Request $request ,$id){
        if(Auth::guard('nguoi_dung')->check()){
            $id_nd = Auth::guard('nguoi_dung')->user()->id;
            $tp = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->join('loai_san_pham','loai_san_pham.id_dm','san_pham.id_lsp')
            ->where('san_pham.id_nb','<>',$id_nd)
            ->where('id_dm',$id)
            ->groupBy('id_tp')->get();


            $danhsach = DB::table('san_pham')
            ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
            ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('loai_san_pham.id_dm',$id)
            ->where('san_pham.id_nb','<>',$id_nd)
            ->select('tbl_tinhthanhpho.*','san_pham.*');
            $danhsach2 = $danhsach->paginate(16)->appends(request()->query());
        }else{
            $tp = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->join('loai_san_pham','loai_san_pham.id_dm','san_pham.id_lsp')
            ->where('id_dm',$id)
            ->groupBy('id_tp')->get();


            $danhsach = DB::table('san_pham')
            ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
            ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('loai_san_pham.id_dm',$id)
            ->select('tbl_tinhthanhpho.*','san_pham.*');
            $danhsach2 = $danhsach->paginate(16)->appends(request()->query());
        }

        $lsp = DB::table('loai_san_pham')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->where('id_dm',$id)
        ->select('danh_muc.*','loai_san_pham.*')
        ->get();

        if($request->id_city != null){
            $id_city = $request->id_city;
            $danhsach2 =  $danhsach->where('matp',$id_city)->paginate(16)->appends(request()->query());
            // $danhsach =collect($danhsach)->paginate(10);


        }
        if($request->productType != null){
            $productType = $request->productType ;
            $danhsach2 = $danhsach->where('id_lsp', $productType)->paginate(16)->appends(request()->query());
            $tp = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('id_lsp', $productType )
            ->where('san_pham.id_nb','<>',$id_nd)
            ->groupBy('id_tp')->get();

        }
        if($request->price != null){
            $price = $request->price;
            if($price==1){
                $danhsach2 = $danhsach->where('gia_sp','<',500000)->paginate(16)->appends(request()->query());
            }elseif($price==2){
                $danhsach2 = $danhsach->whereBetween('gia_sp',[500000,1000000])->paginate(16)->appends(request()->query());
            }elseif($price==3){
                $danhsach2 = $danhsach->whereBetween('gia_sp',[1000000,1500000])->paginate(16)->appends(request()->query());
            }elseif($price==4){
                $danhsach2 = $danhsach->whereBetween('gia_sp',[1500000,2000000])->paginate(16)->appends(request()->query());
            }elseif($price==5){
                $danhsach2 = $danhsach->where('gia_sp','>',2000000)->paginate(16)->appends(request()->query());
            }
        }
        if($request->oderBy != null){
            $oderBy = $request->oderBy;
            if($oderBy=='asc'){
                $danhsach2 = $danhsach->sortBy('id')->paginate(16)->appends(request()->query());
            }else if($oderBy=='desc'){
                $danhsach2 = $danhsach->sortByDesc('id')->paginate(16)->appends(request()->query());
            } if($oderBy=='price_max'){
                $danhsach2 = $danhsach->sortByDesc('gia_sp')->paginate(16)->appends(request()->query());
            } if($oderBy=='price_min'){
                $danhsach2 = $danhsach->sortBy('gia_sp')->paginate(16)->appends(request()->query()) ;
            }
        }

        return view('client.sanpham_danhmuc',compact('danhsach2','lsp','tp'));


    }

    public function product_report_index(){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $danhsach =DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('trang_thai_san_pham','trang_thai_san_pham.id','san_pham.id_trangthai')
        ->where('id_nb',$id_nd)
        ->where('id_trangthai',3)
        ->select('loai_san_pham.*','trang_thai_san_pham.*','san_pham.*')
        -paginate(6);
        return view('client.quanly-cuahang.sanpham.product-report',\compact('danhsach'));
    }

    public function product_report_detail($id){
        $danhsach =DB::table('bao_cao_san_pham')
        ->join('noi_dung_bao_cao','noi_dung_bao_cao.id','bao_cao_san_pham.id_noidungbaocao')
        ->join('nguoi_dung','nguoi_dung.id','bao_cao_san_pham.id_nd')->where('id_sp',$id)
        ->paginate(6);
       return view('client.quanly-cuahang.sanpham.report-detail',compact('danhsach'));
    }

    // public function getProductByProductType(Request $request ,$id_dm,$id_lsp){
    //     $lsp = DB::table('loai_san_pham')
    //     ->where('id_dm',$id_dm)
    //     ->get();
    //     $tp = DB::table('tbl_tinhthanhpho')
    //     ->get();
    //     $danhsach = DB::table('san_pham')
    //         ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
    //         ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
    //         ->where('loai_san_pham.id',$id_lsp)
    //         ->select('tbl_tinhthanhpho.*','san_pham.*')
    //         ->paginate(12);
    //     if($request->id_city != null){
    //         $id_city = $request->id_city;
    //         $danhsach = $danhsach->where('matp',$id_city);
    //     }
    //     if($request->price  != null){
    //         $price = $request->price;
    //         if($price==1){
    //             $danhsach = $danhsach->where('gia_sp','<',500000);
    //         }elseif($price==2){
    //             $danhsach = $danhsach->whereBetween('gia_sp',[500000,1000000]);
    //         }elseif($price==3){
    //             $danhsach = $danhsach->whereBetween('gia_sp',[1000000,1500000]);
    //         }elseif($price==4){
    //             $danhsach = $danhsach->whereBetween('gia_sp',[1500000,2000000]);
    //         }elseif($price==5){
    //             $danhsach = $danhsach->where('gia_sp','>',2000000);
    //         }
    //     }
    //     if($request->oderBy  != null){
    //         $oderBy = $request->oderBy;
    //         if($oderBy=='asc'){
    //             $danhsach = $danhsach->sortBy('id');
    //         }else if($oderBy=='desc'){
    //             $danhsach = $danhsach->sortByDesc('id');
    //         } if($oderBy=='price_max'){
    //             $danhsach = $danhsach->sortByDesc('gia_sp');
    //         } if($oderBy=='price_min'){
    //             $danhsach = $danhsach->sortBy('gia_sp')  ;
    //         }
    //     }
    //     return view('client.sanpham_lsp',compact('danhsach','lsp','tp'));
    // }

    public function report_product(Request $request){
        $mota_bc=$request->mota_bc;
        $id_sp=$request->id_sp;
        $noidung_bc =$request->noidung_bc;
        if(Auth::guard('nguoi_dung')->check()){
            $id_nd = Auth::guard('nguoi_dung')->user()->id;
            $insert= DB::table('bao_cao_san_pham')->insert(
                [
                    'id_sp'=>$id_sp,
                    'mota_bc'=>$mota_bc,
                    'id_nd'=>  $id_nd,
                    'id_noidungbaocao'=>$noidung_bc,
                    'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
                ]);
                $report = DB::table('bao_cao_san_pham')
                ->join('noi_dung_bao_cao','noi_dung_bao_cao.id','bao_cao_san_pham.id_noidungbaocao')
                ->select( DB::raw('SUM(thangdiem_bc) as total'))
                ->where('id_sp',$id_sp)
                ->groupBy('id_sp')->first();
                    if($report->total >= 11){
                        $insert = DB::table('san_pham')->where('id',$id_sp)->update(
                            [
                                'id_trangthai'=>3
                            ]);
                    }
                    Session::flash("success-report","Báo cáo sản phẩm thành công");
                    return redirect()->back();

        }else{
            Session::flash("error-report","Bạn cần đăng nhập để báo cáo sản phẩm");
                return redirect()->back();
        }
    }
}




// $danhsach = DB::table('san_pham')
// ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
// ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
// ->where('loai_san_pham.id',$id_lsp)
// ->select('tbl_tinhthanhpho.*','san_pham.*')
// ->paginate(1);
