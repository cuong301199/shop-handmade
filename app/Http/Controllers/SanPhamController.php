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
    public function index(Request $request){
        $key = $request->key;
        $orderBy = $request->orderBy;
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $danhsach1 = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->join('nguoi_dung','nguoi_dung.id','san_pham.id_nb')
        ->join('trang_thai_san_pham','trang_thai_san_pham.id','san_pham.id_trangthai')
        ->where('id_nb',$id_nd)
        ->where('id_trangthai','<>',3)
        ->orderBy('san_pham.created_at','DESC')
        ->select('san_pham.*','trang_thai_san_pham.*','danh_muc.*','loai_san_pham.*','san_pham.id');
        $danhsach = $danhsach1->paginate(8)->appends(request()->query());
        if($key  && $orderBy  == 'null'){
            $danhsach = $danhsach1->where('ten_sp','like','%'.$key.'%')->paginate(8)->appends(request()->query());
        }
        if($key  &&  $orderBy != 'null'){
            if($orderBy == 'ten_lsp'){
                $danhsach = $danhsach1->where('ten_lsp','like','%'.$key.'%')->paginate(8)->appends(request()->query());
            }else{
                $danhsach = $danhsach1->where('ten_dm','like','%'.$key.'%')->paginate(8)->appends(request()->query());
            }
        }
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
                Session::flash("error","Thi???u h??nh ???nh s???n ph???m");
                return redirect()->route('sanpham.create');
            }
            return redirect()->back();
            // Session::flash("success","Th??m th??nh c??ng");
            // return redirect()->route('sanpham.index');
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

        Session::flash("success","X??a th??nh c??ng");
        return redirect()->back();
    }

    public function edit($id){

        $danhsach_dm = DB::table('danh_muc')
        ->get();

        $danhsach_lsp = DB::table('loai_san_pham')
        ->get();

        $danhsach = DB::table('san_pham')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','san_pham.id_qh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','san_pham.id_xa')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->where('san_pham.id',$id)
        ->select('tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','loai_san_pham.*','danh_muc.*','san_pham.*')
        ->first();

        $hinhanh = DB::table('hinh_anh')
        ->where('id_sp',$id)
        ->get();

        $tp = DB::table('tbl_tinhthanhpho')
        ->get();

        return view('client.quanly-cuahang.sanpham.edit', compact('danhsach','danhsach_dm','danhsach_lsp','hinhanh','tp'));


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
        Session::flash("success","S???a th??nh c??ng");
        return redirect()->back();
    }

    public function deleteImage($id){
        $delete = DB::table('hinh_anh')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function getProductByCat(Request $request ,$id){
        if(Auth::guard('nguoi_dung')->check()){
            $id_nd = Auth::guard('nguoi_dung')->user()->id;
            $tp1 = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->join('loai_san_pham','loai_san_pham.id_dm','san_pham.id_lsp')
            ->where('san_pham.id_nb','<>',$id_nd);
            // ->groupBy('id_tp');

            $danhsach = DB::table('san_pham')
            ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
            ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('loai_san_pham.id_dm',$id)
            ->where('san_pham.id_nb','<>',$id_nd)
            ->select('tbl_tinhthanhpho.*','san_pham.*');

            if($request->productType != null){
            $productType = $request->productType;
            $danhsach2 = $danhsach->where('id_lsp', $productType)->paginate(16)->appends(request()->query());
            $tp = $tp1->where('id_lsp', $productType)
            ->select('id_tp','name_tp',DB::raw('count(san_pham.id) as total'))
            ->groupBy('id_tp')->get();
            }else{
            $tp = $tp1->where('loai_san_pham.id_dm',$id)
             ->select('id_tp','name_tp',DB::raw('count(san_pham.id) as total'))
             ->groupBy('id_tp')->get();

            $danhsach2 = $danhsach->paginate(16)->appends(request()->query());
            }
        }else{
            $tp1 = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->join('loai_san_pham','loai_san_pham.id_dm','san_pham.id_lsp');

            $danhsach = DB::table('san_pham')
            ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
            ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('loai_san_pham.id_dm',$id)
            ->select('tbl_tinhthanhpho.*','san_pham.*');

            if($request->productType != null){
            $productType = $request->productType;
            $danhsach2 = $danhsach->where('id_lsp', $productType)->paginate(16)->appends(request()->query());
            $tp = $tp1->where('id_lsp', $productType)
            ->select('id_tp','name_tp',DB::raw('count(san_pham.id) as total'))
            ->groupBy('id_tp')->get();
            }else{
            $tp = $tp1->where('loai_san_pham.id_dm',$id)
            ->select('id_tp','name_tp',DB::raw('count(san_pham.id) as total'))
            ->groupBy('id_tp')->get();


            $danhsach2 = $danhsach->paginate(16)->appends(request()->query());
            }
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
        // if($request->productType != null){
        //     $productType = $request->productType;
        //     $danhsach2 = $danhsach->where('id_lsp', $productType)->paginate(16)->appends(request()->query());
        //     $tp2 = $tp1->where('id_lsp', $productType)
        //     ->select('id_tp','name_tp',DB::raw('count(san_pham.id) as total'))
        //     ->groupBy('id_tp')->get();
        // }
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
                $danhsach2 = $danhsach->orderBy('id','asc')->paginate(16)->appends(request()->query());
            }else if($oderBy=='desc'){
                $danhsach2 = $danhsach->orderBy('id','desc')->paginate(16)->appends(request()->query());
            } if($oderBy=='price_max'){
                $danhsach2 = $danhsach->orderBy('gia_sp','desc')->paginate(16)->appends(request()->query());
            } if($oderBy=='price_min'){
                $danhsach2 = $danhsach->orderBy('gia_sp','asc')->paginate(16)->appends(request()->query()) ;
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
        ->paginate(6);
        return view('client.quanly-cuahang.sanpham.product-report',\compact('danhsach'));
    }

    public function product_report_detail($id){
        $danhsach =DB::table('bao_cao_san_pham')
        ->join('noi_dung_bao_cao','noi_dung_bao_cao.id','bao_cao_san_pham.id_noidungbaocao')
        ->join('nguoi_dung','nguoi_dung.id','bao_cao_san_pham.id_nd')->where('id_sp',$id)
        ->paginate(6);
       return view('client.quanly-cuahang.sanpham.report-detail',compact('danhsach'));
    }


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
                    Session::flash("success-report","B??o c??o s???n ph???m th??nh c??ng");
                    return redirect()->back();

        }else{
            Session::flash("error-report","B???n c???n ????ng nh???p ????? b??o c??o s???n ph???m");
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
