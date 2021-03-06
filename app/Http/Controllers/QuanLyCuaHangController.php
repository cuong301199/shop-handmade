<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Carbon\Carbon;
class QuanLyCuaHangController extends Controller
{
    //
    public function index(){
        return view('client.quanly-cuahang.index');
    }

    public function manage_oder(Request $request){
        $key = $request->key;
        $orderBy = $request->orderBy;
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $oder1 = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('id_nb',$id_nd)
                ->orderBy('hoa_don.id','desc')
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*');
        $oder =$oder1->paginate(6)->appends(request()->query());
        if($key  && $orderBy  == 'null'){
            $oder = $oder1->where('ten_nd','like','%'.$key.'%')->paginate(8)->appends(request()->query());
        }
        if($key  &&  $orderBy != 'null'){
            if($orderBy == 'code'){
                $oder = $oder1->where('ma_hd','like','%'.$key.'%')->paginate(8)->appends(request()->query());
            }else{
                $oder = $oder1->where('ten_lsp','like','%'.$key.'%')->paginate(8)->appends(request()->query());
            }
        }
        return view('client.quanly-cuahang.donhang.index',compact('oder'));
    }

    public function manage_oder_detail(Request $request,$id){
        $khachhang = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->select('nguoi_dung.*','trang_thai_don_hang.*','hoa_don.*')
        ->where('hoa_don.id',$id)
        ->first();
        $ttvc = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('hoa_don.id',$id)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
                ->first ();

        // $mgg = DB::table('ma_giam_gia')
        // ->join('hoa_don','hoa_don.id_mgg','ma_giam_gia.id')
        // ->where('hoa_don.id',$id)
        // ->first();
        // $tt = DB::table('trang_thai_don_hang')
        // ->get();
        $danhsach = DB::table('chi_tiet_hoa_don')
        ->join('hoa_don','hoa_don.id','chi_tiet_hoa_don.id_hd')
        ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
        ->where('id_hd',$id)
        ->select('san_pham.*','hoa_don.*','chi_tiet_hoa_don.*')
        ->get();
        return view('client.quanly-cuahang.donhang.chitiet-donhang',compact('danhsach','khachhang','ttvc'));
    }

    public function update_qty(Request $request){
        $id_sp = $request->id_sp;
        $cthd_hd = $request->cthd_hd;
        $qty = $request->qty;
        $id_hd = $request->id_hd;


        $cthd = DB::table('chi_tiet_hoa_don')
        ->where('id',$cthd_hd)
        ->first();

        $hd = DB::table('hoa_don')
        ->where('id',$id_hd)
        ->first();


        if($qty > $cthd->so_luong){
            $qty_sp = $qty - $cthd->so_luong;
            $gia = $qty_sp * $cthd->gia_sp;
            $tong_gia = $hd->tong_tien + $gia;
            $update1 = DB::table('hoa_don')->where('id',$id_hd)->update(
                [
                    'tong_tien'=>$tong_gia,
                ]);

        }else if($qty < $cthd->so_luong){
            $qty_sp = $cthd->so_luong - $qty;
            $gia = $qty_sp * $cthd->gia_sp;
            $tong_gia = $hd->tong_tien - $gia;
            $update1 = DB::table('hoa_don')->where('id',$id_hd)->update(
                [
                    'tong_tien'=>$tong_gia,
                ]);
        }

        $update = DB::table('chi_tiet_hoa_don')->where('id', $cthd_hd)->update(
            [
                'so_luong'=>$qty,
            ]
        );

    }

    public function accepOder(Request $request){
        $id_tt = $request->id_tt;
        $order_product_id = $request->order_product_id;
        $soluong_sp = $request->soluong_sp;
        $id_hd = $request->id_hd;
        $id_tt_present = $request->id_tt_present;

        $update1 = DB::table('hoa_don')->where('id',$id_hd)->update(
            [
                'id_tt'=>$id_tt,
            ]
        );

        if( $id_tt_present == 1){
            if($id_tt == 3){
                foreach($order_product_id as $key => $product_id){
                    $product = DB::table('san_pham')->where('id',$product_id)->first();
                    $product_quanty =$product->soluong_sp;
                    $product_sold = $product->soluong_daban;
                    foreach($soluong_sp as $key2 => $quantity){
                        if($key==$key2){
                            $sp_conlai = $product_quanty - $quantity;
                            $sp_daban = $product_sold + $quantity;
                            $update = DB::table('san_pham')->where('id',$product_id)->update(
                                [
                                    'soluong_sp'=> $sp_conlai,
                                    'soluong_daban'=>$sp_daban
                                ]
                            );
                        }
                    }
                }
            }
        }

        if( $id_tt_present== 3){
            if($id_tt == 5){
                foreach($order_product_id as $key => $product_id){
                    $product = DB::table('san_pham')->where('id',$product_id)->first();
                    $product_quanty =$product->soluong_sp;
                    $product_sold = $product->soluong_daban;
                    foreach($soluong_sp as $key2 => $quantity){
                        if($key==$key2){
                            $sp_conlai = $product_quanty + $quantity;
                            $sp_daban = $product_sold - $quantity;
                            $update = DB::table('san_pham')->where('id',$product_id)->update(
                                [
                                    'soluong_sp'=> $sp_conlai,
                                    'soluong_daban'=>$sp_daban
                                ]
                            );
                        }
                    }
                }
            }
        }











        // if($id_tt==3){
        //     foreach($order_product_id as $key => $product_id){
        //         $product = DB::table('san_pham')->where('id',$product_id)->first();
        //         $product_quanty =$product->soluong_sp;
        //         $product_sold = $product->soluong_daban;
        //         foreach($soluong_sp as $key2 => $quantity){
        //             if($key==$key2){
        //                 $sp_conlai = $product_quanty - $quantity;
        //                 $sp_daban = $product_sold + $quantity;
        //                 $update = DB::table('san_pham')->where('id',$product_id)->update(
        //                     [
        //                         'soluong_sp'=> $sp_conlai,
        //                         'soluong_daban'=>$sp_daban
        //                     ]
        //                 );
        //             }
        //         }
        //     }
        // }else if($id_tt == 5 ){
        //     foreach($order_product_id as $key => $product_id){
        //         $product = DB::table('san_pham')->where('id',$product_id)->first();
        //         $product_quanty =$product->soluong_sp;
        //         $product_sold = $product->soluong_daban;
        //         foreach($soluong_sp as $key2 => $quantity){
        //             if($key==$key2){
        //                 $sp_conlai = $product_quanty + $quantity;
        //                 $sp_daban = $product_sold - $quantity;
        //                 $update = DB::table('san_pham')->where('id',$product_id)->update(
        //                     [
        //                         'soluong_sp'=> $sp_conlai,
        //                         'soluong_daban'=>$sp_daban
        //                     ]
        //                 );
        //             }
        //         }
        //     }
        // }




    }

    public function order(Request $request){
        $key = $request->key;
        $orderBy = $request->orderBy;
        $id= Auth::guard('nguoi_dung')->user()->id;
        $oder1 = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
        ->where('hoa_don.id_nm',$id)
        ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*');
        $oder = $oder1->paginate(6)->appends(request()->query());


        if($key  && $orderBy  == 'null'){
            $oder = $oder1->where('ma_hd','like','%'.$key.'%')->paginate(8)->appends(request()->query());
        }
        if($key  &&  $orderBy != 'null'){
            if($orderBy == 'code'){
                $oder = $oder1->where('ma_hd','like','%'.$key.'%')->paginate(8)->appends(request()->query());
            }else{
                $oder1 = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nb')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('hoa_don.id_nm',$id)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*');
                $oder = $oder1->where('ten_nd','like','%'.$key.'%')->paginate(8)->appends(request()->query());
            }
        }




        return view('client.quanly-cuahang.donhangdadat.index',compact('oder'));
    }

    public function oder_detail(Request $request,$id){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $khachhang = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->select('nguoi_dung.*','trang_thai_don_hang.*','hoa_don.*')
        ->where('hoa_don.id',$id)
        ->first();
        $ttvc = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('hoa_don.id',$id)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
                ->first ();
        $danhsach = DB::table('chi_tiet_hoa_don')
        ->join('hoa_don','hoa_don.id','chi_tiet_hoa_don.id_hd')
        ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
        ->where('id_hd',$id)
        ->get();
        return view('client.quanly-cuahang.donhangdadat.chitiet-donhang',compact('khachhang','ttvc','danhsach'));
    }




    public function manage_chars_oder(){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $vlog = DB::table('bai_viet')->where('id_nd',$id_nd)->count();
        $product = DB::table('san_pham')->where('id_nb',$id_nd)->count();
        return view('client.quanly-cuahang.thongke-danhthu.index',compact('vlog','product'));
    }

    public function manage_chars_oder_30day(){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $now =   $now = Carbon::now('Asia/Ho_Chi_Minh');
        $sub30days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(30);

        $danhsach = DB::table('hoa_don')
        ->where('id_nb',$id_nb)
        ->whereBetween('created_at',[$sub30days,$now])
        ->select('created_at', DB::raw('SUM(tong_tien) as tong_tien'),
            // DB::raw('count(id) as don_hang'),
            // DB::raw('SUM(tong_sp) as tong_sp')
            )
        ->orderBy('created_at','asc')
        ->groupBy('created_at')
        ->get();

            foreach($danhsach as $key => $val){
                $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                $data[]=array(
                    'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                    'tong_tien'=>$val->tong_tien,
                    // 'don_hang'=>$val->don_hang,
                    // 'tong_sp'=>$val->tong_sp
                );
            }
        // $danhsach = DB::table('san_pham')->get();
        return response()->json($data, 200);
    }

    public function filter_by_date(Request $request){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if( $request->orderBy == "day"){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[$from_date,$to_date])
            ->orderBy('created_at','asc')
            ->select('created_at', DB::raw('SUM(tong_tien) as tong_tien'),
                // DB::raw('count(id) as don_hang'),
                // DB::raw('SUM(tong_sp) as tong_sp')
                )
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        'tong_tien'=>$val->tong_tien,
                        // 'don_hang'=>$val->don_hang,
                        // 'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }else{
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[$from_date,$to_date])
            ->orderBy('created_at','asc')
            ->select('created_at',
                 DB::raw('SUM(tong_tien) as tong_tien'),
            )
            ->groupBy( DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->get();
                foreach($danhsach as $key => $val){
                    $date = \Carbon\Carbon::parse( $val->created_at)->format('m-Y');
                    $data[]=array(
                        'created_at'=>$date,
                        'tong_tien'=>$val->tong_tien,
                    );
                }
            return response()->json($data, 200);
        }

    }

    public function filter_dashboard(Request $request){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $filter = $request->filter;

        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $sub7days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(7);

        $sub30days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(30);

        $sub365days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(355);

        $dau_thangtruoc =   Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth();

        $cuoi_thangtruoc =   Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth();

        $dau_thangnay =  Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth();

        if($filter == 'thangnay'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[ $dau_thangnay,$now])
            ->select('created_at', DB::raw('SUM(tong_tien) as tong_tien')) // DB::raw('count(id) as don_hang'),  // DB::raw('SUM(tong_sp) as tong_sp')
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        'tong_tien'=>$val->tong_tien,
                        // 'don_hang'=>$val->don_hang,
                        // 'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }elseif($filter == '7truoc'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[  $sub7days,$now])
            ->select('created_at', DB::raw('SUM(tong_tien) as tong_tien')) // DB::raw('count(id) as don_hang'),  // DB::raw('SUM(tong_sp) as tong_sp')
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        'tong_tien'=>$val->tong_tien,
                        // 'don_hang'=>$val->don_hang,
                        // 'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }elseif($filter == '30truoc'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[  $sub30days,$now])
            ->select('created_at', DB::raw('SUM(tong_tien) as tong_tien')) // DB::raw('count(id) as don_hang'),  // DB::raw('SUM(tong_sp) as tong_sp')
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        'tong_tien'=>$val->tong_tien,
                        // 'don_hang'=>$val->don_hang,
                        // 'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }else{
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[ $sub365days,$now])
            ->select('created_at', DB::raw('SUM(tong_tien) as tong_tien')) // DB::raw('count(id) as don_hang'),  // DB::raw('SUM(tong_sp) as tong_sp')
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        'tong_tien'=>$val->tong_tien,
                        // 'don_hang'=>$val->don_hang,
                        // 'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }
    }

    public function manage_chars_product(){
        return view('client.quanly-cuahang.thongke-danhthu.thongke_donhang');
    }

    public function manage_chars_product_30day(Request $request){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $now =   $now = Carbon::now('Asia/Ho_Chi_Minh');
        $sub30days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(30);

        $danhsach = DB::table('hoa_don')
        ->where('id_nb',$id_nb)
        ->whereBetween('created_at',[$sub30days,$now])
        ->orderBy('created_at','asc')
        ->select('created_at',
            DB::raw('count(id) as don_hang'),
            DB::raw('SUM(tong_sp) as tong_sp')
            )
        ->groupBy('created_at')
        ->get();

            foreach($danhsach as $key => $val){
                $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                $data[]=array(
                    'created_at'=>\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d'),
                    'don_hang'=>$val->don_hang,
                    'tong_sp'=>$val->tong_sp
                );
            }
        // $danhsach = DB::table('san_pham')->get();
        return response()->json($data, 200);
    }
    public function filter_by_date_product(Request $request){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if($request->orderBy == 'day'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[$from_date,$to_date])
            ->orderBy('created_at','asc')
            ->select('created_at',
                DB::raw('count(id) as don_hang'),
                DB::raw('SUM(tong_sp) as tong_sp')
                )
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        // 'tong_tien'=>$val->tong_tien,
                        'don_hang'=>$val->don_hang,
                        'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }else{
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[$from_date,$to_date])
            ->orderBy('created_at','asc')
            ->select('created_at',
                DB::raw('count(id) as don_hang'),
                DB::raw('SUM(tong_sp) as tong_sp')
                )
            ->groupBy( DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->get();

            foreach($danhsach as $key => $val){
                $date=\Carbon\Carbon::parse( $val->created_at)->format('m-Y');
                $data[]=array(
                    'created_at'=>$date,
                    // 'tong_tien'=>$val->tong_tien,
                    'don_hang'=>$val->don_hang,
                    'tong_sp'=>$val->tong_sp
                );
            }

            return response()->json($data, 200);
        }
    }

    public function filter_dashboard_product(Request $request){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $filter = $request->filter;

        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $sub7days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(7);

        $sub30days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(30);

        $sub365days =  Carbon::now('Asia/Ho_Chi_Minh')->subdays(355);

        $dau_thangtruoc =   Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth();

        $cuoi_thangtruoc =   Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth();

        $dau_thangnay =  Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth();

        if($filter == 'thangnay'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[ $dau_thangnay,$now])
            ->select('created_at',DB::raw('count(id) as don_hang'), DB::raw('SUM(tong_sp) as tong_sp'))
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        'don_hang'=>$val->don_hang,
                        'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }elseif($filter == '7truoc'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[  $sub7days,$now])
            ->select('created_at',DB::raw('count(id) as don_hang'), DB::raw('SUM(tong_sp) as tong_sp'))
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,

                        'don_hang'=>$val->don_hang,
                        'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }elseif($filter == '30truoc'){
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[  $sub30days,$now])
            ->select('created_at',DB::raw('count(id) as don_hang'), DB::raw('SUM(tong_sp) as tong_sp'))
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        // 'tong_tien'=>$val->tong_tien,
                        'don_hang'=>$val->don_hang,
                        'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }else{
            $danhsach = DB::table('hoa_don')
            ->where('id_nb',$id_nb)
            ->whereBetween('created_at',[ $sub365days,$now])
            ->select('created_at',DB::raw('count(id) as don_hang'), DB::raw('SUM(tong_sp) as tong_sp'))
            ->groupBy('created_at')
            ->get();
                foreach($danhsach as $key => $val){
                    $date=\Carbon\Carbon::parse( $val->created_at)->format('Y-m-d');
                    $data[]=array(
                        'created_at'=>$date,
                        // 'tong_tien'=>$val->tong_tien,
                        'don_hang'=>$val->don_hang,
                        'tong_sp'=>$val->tong_sp
                    );
                }
            // $danhsach = DB::table('san_pham')->get();
            return response()->json($data, 200);
        }
    }

    public function inventory(){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        $product1 = DB::table('san_pham')
        ->where('id_nb',$id_nd);
        $product = $product1->paginate(6)->appends(request()->query());
        return view('client.quanly-cuahang.tonkho.index',compact('product'));
    }
    public function update_qty_inventory(Request $request){
        $id_sp = $request->id_sp;
        $qty = $request->qty;
        $update = DB::table('san_pham')->where('id',$id_sp)->update(
            [
                'soluong_sp'=>$qty,
            ]);
    }

}
