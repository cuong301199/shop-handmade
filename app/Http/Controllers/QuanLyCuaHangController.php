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

    public function manage_oder(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $oder = DB::table('hoa_don')
                ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
                ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
                ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
                ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
                ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
                ->where('id_nb',$id_nd)
                ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
                ->get();
            // $danhsach = DB::table('chi_tiet_hoa_don')
            // ->join('hoa_don','hoa_don.id','chi_tiet_hoa_don.id_hd')
            // ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
            // ->where('id_hd',$id)
            // ->get();

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
        ->get();
        return view('client.quanly-cuahang.donhang.chitiet-donhang',compact('danhsach','khachhang','ttvc'));
    }

    public function accepOder(Request $request,$id){
        $id_tt = $request->id_tt;
        $id_sp = $request->id_sp;
        $soluong_sp = $request->soluong_sp;
        if($id_tt==3){
            foreach($id_sp as $key => $product_id){
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
            if($update){
                Session::flash("success-aceepOder-3","Cập nhập đơn hàng thành công");
                return redirect()->back();
            }
        }
        $update = DB::table('hoa_don')->where('id',$id)->update(
            [
                'id_tt'=>$id_tt,
            ]
        );
        if($update){
            Session::flash("success-aceepOder","Cập nhập đơn hàng thành công");
            return redirect()->back();
        }


    }

    public function order(){
        $id= Auth::guard('nguoi_dung')->user()->id;
        $oder = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
        ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xp')
        ->where('hoa_don.id_nm',$id)
        ->select('trang_thai_don_hang.*','nguoi_dung.*','thong_tin_van_chuyen.*','tbl_tinhthanhpho.*','tbl_quanhuyen.*','tbl_xaphuongthitran.*','hoa_don.*')
        ->get();
        $ttvc = DB::table('hoa_don')
        // ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nm')
        // ->join('thong_tin_van_chuyen','thong_tin_van_chuyen.id','hoa_don.id_ttvc')
        // ->join('trang_thai_don_hang','trang_thai_don_hang.id','hoa_don.id_tt')
        ->join('chi_tiet_hoa_don','chi_tiet_hoa_don.id_hd','hoa_don.id')
        ->where('hoa_don.id_nm',$id)
        ->select('chi_tiet_hoa_don.*','hoa_don.*')
        ->groupby('chi_tiet_hoa_don.id_hd')
        ->get();
        $nguoiban = DB::table('hoa_don')
        ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nb')
        ->first();


        return view('client.quanly-cuahang.donhangdadat.index',compact('oder','ttvc'));
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
        return view('client.quanly-cuahang.thongke-danhthu.index');
    }

    public function filter_by_date(Request $request){
        $id_nb = Auth::guard('nguoi_dung')->user()->id;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $danhsach = DB::table('hoa_don')
        ->where('id_nb',$id_nb)
        ->whereBetween('created_at',[$from_date,$to_date])
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


}
