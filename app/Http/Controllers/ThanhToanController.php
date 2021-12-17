<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Cart;
use Carbon\Carbon;
class ThanhToanController extends Controller
{
    public function index(){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $nguoidung = DB::table('nguoi_dung')->where('id',$id_nd)->first();
        return view('client.thanhtoan',compact('nguoidung'));
    }


    // public function index(Request $request){
    //     $tp = DB::table('tbl_tinhthanhpho')->get();
    //     return view('client.checkout.index',compact('tp'));
    // }

    // public function checkout(Request $request,$id){
    //     Session::put('id_nb',$id);
    //     return redirect()->route('checkout.index');
    //     // return view('client.checkout.index');
    // }


    public function thanhToan($id){
        $id_nd = Auth::guard('nguoi_dung')->user()->id;
        // $ttvc = DB::table('thong_tin_van_chuyen')
        // ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','thong_tin_van_chuyen.id_tp')
        // ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','thong_tin_van_chuyen.id_qh')
        // ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.maxa','thong_tin_van_chuyen.id_xa')
        // ->where('id_nm',$id_nd)->first();
        // $feeship = DB::table('thong_tin_van_chuyen')->where('id_nm',$id_nd)->first();
        // $fee = DB::table('phi_van_chuyen')->where('id_tp',$feeship->id_tp)->first();
        // Session::flash('fee',$fee->phi_pvc);
        $tp = DB::table('tbl_tinhthanhpho')->get();
        $qh = DB::table('tbl_quanhuyen')->get();
        $xp = DB::table('tbl_xaphuongthitran')->get();
        // Session::flash('fee',30000);
        Session::put('id_nb',$id);
        return view('client.thanhtoan',compact('tp'));
    }
    public function check_coupon(Request $request){
        $coupon = $request->coupon;
        // $fee_ship = $request->fee_ship;
        // $total_price = $request->total_price;
        // $coupon = DB::table('ma_giam_gia')->where('ma_mgg',$data)->first();
        // $count_coupon = DB::table('ma_giam_gia')->where('ma_mgg',$data)->count();
        $output="";

        $data = DB::table('ma_giam_gia')->where('ma_mgg',$coupon)->first();
        if($data != null){
            if($data->dieukien_mgg==1){
                $total_price1 = Session::get('total_price') - $data->giatri_mgg;
                $output.='
                <div class="row">
                <div class="col-md-4">
                    <label for="">Phí giao hàng</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.number_format( Session::get('fee')).' VND</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Tên mã giảm giá</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.$data->ten_mgg.'</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Giá trị giảm</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.number_format($data->giatri_mgg).' VND</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Tổng hóa đơn</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p> '.number_format( $total_price1).' VND</p>
                </div>
                </div>
                <input class="fee_ship" name="fee_ship" type="hidden" value="'. Session::get('fee').'"></input>
                <input class="coupon" name="coupon" type="hidden" value="'.$coupon.'"></input>
                <input class="sotiengiam" name="sotiengiam" type="hidden" value="'.$data->giatri_mgg.'"></input>
                <input  class="total_price" name="total_price" type="hidden" value="'. $total_price1 .'"></input>
                ';

            }else{
                $total_price1 = Session::get('total_price') - (Session::get('total_price')*$data->giatri_mgg/100);
                $output.='
                <div class="row">
                <div class="col-md-4">
                    <label for="">Phí giao hàng</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.number_format( Session::get('fee')).' VND</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Tên mã giảm giá</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.$data->ten_mgg.'</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Giá trị giảm</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.number_format($data->giatri_mgg).' %</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Số tiền giảm</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p>'.number_format(Session::get('total_price')*$data->giatri_mgg/100).' VND</p>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <label for="">Tổng hóa đơn</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p> '.number_format( $total_price1).' VND</p>
                </div>
                </div>
                <input class="fee_ship" name="fee_ship" type="hidden" value="'. Session::get('fee').'"></input>
                <input class="coupon" name="coupon" type="hidden" value="'.$coupon.'"></input>
                <input class="sotiengiam" name="sotiengiam" type="hidden" value="'.(Session::get('total_price')*$data->giatri_mgg/100).'"></input>
                <input  class="total_price" name="total_price" type="hidden" value="'. $total_price1 .'"></input>
                ';


            }
        }else{
            $output.="false";
        }

        return $output;
        // if($coupon){
        //     // $count_coupon = $coupon->count();
        //     if($count_coupon>0){
        //         $coupon_session = Session::get('coupon');
        //         if($coupon_session == true){
        //             $is_avalible = 0;
        //             if($is_avalible == 0){
        //                 $cou[]= array(
        //                     'coupon_code'=>$coupon->ma_mgg,
        //                     'coupon_condition'=>$coupon->dieukien_mgg,
        //                     'coupon_number'=>$coupon->giatri_mgg
        //                 );
        //                 Session::put('coupon',$cou);
        //             }
        //         }else{
        //             $cou[]= array(
        //                 'coupon_code'=>$coupon->ma_mgg,
        //                 'coupon_condition'=>$coupon->dieukien_mgg,
        //                 'coupon_number'=>$coupon->giatri_mgg
        //             );
        //             Session::put('coupon',$cou);
        //         }
        //         Session::flash("success", "nhập mã giảm giá thành công");
        //         return redirect()->back();
        //     }
        // }else{
        //     Session::flash("error", "Mã giảm giá không tồn tại");
        //         return redirect()->back();
        // }

    }

    public function unset_coupon(){
        Session::get('total_price');
        $output="";
        $output.= '
        <div class="row">
            <div class="col-md-3">
                <label for="">Phí giao hàng</label>
            </div>
            <div class="col-md-6 no padding-left">
                <p>'.number_format(Session::get('fee')).' VND</p>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3">
            <label for="">Tổng hóa đơn</label>
        </div>
        <div class="col-md-6 no padding-left">
            <p> '.number_format(Session::get('total_price')).' VND</p>
        </div>
        </div>
        <input class="fee_ship" name="fee_ship" type="hidden" value="'. Session::get('fee').'"></input>
        <input  class="total_price" name="total_price" type="hidden" value="'. Session::get('total_price') .'"></input>'
            ;

            return $output;

    }
    public function check_feeship(Request $request){
        $id_nb = Session::get('id_nb');

        $id_city = $request->id_city;
        $total_price=$request->total_price;
        $id_xp= $request->id_xp;
        $id_qh= $request-> id_qh;

        $fee = DB::table('phi_van_chuyen')->where('id_nd',$id_nb)->where('id_tp',$id_city)->first();

        $output='';
        if($fee == null){
            Session::put('fee',50000);
            $fee_ship = 50000;

        }else{
            Session::put('fee',$fee->phi_pvc);
             $fee_ship=$fee->phi_pvc;

        }
        $total_price+=$fee_ship;
        Session::put('total_price', $total_price);
        if(!$id_city==null){
            $output.= '
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Phí giao hàng</label>
                    </div>
                    <div class="col-md-6 no padding-left">
                        <p>'.number_format($fee_ship).' VND</p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <label for="">Tổng hóa đơn</label>
                </div>
                <div class="col-md-6 no padding-left">
                    <p> '.number_format( $total_price).' VND</p>
                </div>
                </div>
                <input class="fee_ship" name="fee_ship" type="hidden" value="'.  $fee_ship.'"></input>
                <input class="coupon_code"  type="hidden" value=""></input>
                <input  class="total_price" name="total_price" type="hidden" value="'. $total_price .'"></input>'

            ;

        }
        return $output;



    }

    // public function createShipping(Request $request){
    //     $ten_ttvc =$request->ten;
    //     $sdt_ttvc = $request->sdt;
    //     $diachi_ttvc=$request->diachi;
    //     $email = $request->email;
    //     $thanhPho = $request->thanhPho;
    //     $quanHuyen = $request->quanHuyen;
    //     $xaPhuong = $request->xaPhuong;
    //     $id_nd= Auth::guard('nguoi_dung')->user()->id;

    //     $insert = DB::table('thong_tin_van_chuyen')->insert(
    //         [
    //             'ten_ttvc'=>$ten_ttvc,
    //             'sdt_ttvc'=>$sdt_ttvc,
    //             'diachi_ttvc'=>$diachi_ttvc,
    //             'email'=>$email,
    //             'id_nm'=>$id_nd,
    //             'id_tp'=>$thanhPho,
    //             'id_qh'=> $quanHuyen,
    //             'id_xa'=>$xaPhuong,
    //         ]
    //     );
    //    return redirect()->route('cart.list');
    // }



    public function store(Request $request, $id){
        $id_nd= Auth::guard('nguoi_dung')->user()->id;
        $ghiChu =$request->ghiChu;
        $phuongThucThanhToan = $request->phuongThucThanhToan;
        $tong_sp = $request->tong_sp;
        $tongTien = $request->total_price;
        $sotiengiam = $request->sotiengiam;
        // $ttvc = DB::table('thong_tin_van_chuyen')->where('id_nm',$id_nd)->first();
        $coupon_code = $request->coupon;
        // date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_tp =$request->id_city;
        $id_qh = $request->id_qh;
        $id_xp= $request->id_xp;
        $diachi_ttvc = $request->diaChi;
        $sdt_ttvc = $request->sdt;
        $phiVanChuyen = $request->fee_ship;
        $ma_hd ='HN'.rand(0,999).'HM'.rand();
        // if($phuongThucThanhToan=="" || $$phuongThucThanhToan == null ){
        //     Session::flash("error", "Bạn chưa chọn phương thức thanh toán");
        //     return redirect()->back();
        // }
        $insert_ttvc = DB::table('thong_tin_van_chuyen')->insertGetId(
            [
                'id_tp'=>$id_tp,
                'id_qh'=> $id_qh,
                'id_xp'=>  $id_xp,
                'diachi_ttvc'=> $diachi_ttvc,
                'sdt_ttvc'=>$sdt_ttvc
            ]
        );
        $insert_hd = DB::table('hoa_don')->insertGetId(
            [
                'ma_hd'=>$ma_hd,
                'id_nm'=>$id_nd,
                'id_nb'=>$id,
                'ghi_chu'=>$ghiChu,
                'id_pttt'=>$phuongThucThanhToan,
                'tong_sp'=> $tong_sp,
                'magiamgia'=> $coupon_code,
                'id_ttvc'=>$insert_ttvc,
                'tong_tien'=>$tongTien,
                'sotiengiam'=>$sotiengiam,
                'phivanchuyen_hd'=> $phiVanChuyen ,
                'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')->toDateString()
            ]
        );
        // if($coupon_code != null){
        //     $coupon =DB::table('ma_giam_gia')->where('ma_mgg',$coupon_code)->first();
        //     $inserth = DB::table('hoa_don')->insertGetId(
        //         [
        //             'id_nm'=>$id_nd,
        //             'id_nb'=>$id,
        //             'ghi_chu'=>$ghiChu,
        //             'id_pttt'=>$phuongThucThanhToan,
        //             'tong_sp'=> $tong_sp,
        //             'id_ttvc'=>$ttvc->id,
        //             'tong_tien'=>$tongTien,
        //             'id_mgg'=>  $coupon->id,
        //             'phi_van_chuyen'=> $phiVanChuyen ,
        //             'created_at'=>now()
        //         ]
        //     );
        // }else{
        //     $inserth = DB::table('hoa_don')->insertGetId(
        //         [
        //             'id_nm'=>$id_nd,
        //             'id_nb'=>$id,
        //             'ghi_chu'=>$ghiChu,
        //             'id_pttt'=>$phuongThucThanhToan,
        //             'tong_sp'=> $tong_sp,
        //             'id_ttvc'=>$ttvc->id,
        //             'tong_tien'=>$tongTien,
        //             'id_mgg'=>null,
        //             'phi_van_chuyen'=> $phiVanChuyen ,
        //             'created_at'=>now()
        //         ]
        //     );

        // }

        // $inserth = DB::table('hoa_don')->insertGetId(
        //     [
        //         'id_nm'=>$id_nd,
        //         'id_nb'=>$id,
        //         'ghi_chu'=>$ghiChu,
        //         'id_pttt'=>$phuongThucThanhToan,
        //         'tong_sp'=> $tong_sp,
        //         'id_ttvc'=>$ttvc->id,
        //         'tong_tien'=>$tongTien,
        //         'id_mgg'=>  $coupon->id,
        //         'created_at'=>now()
        //     ]
        // );

        foreach(Cart::content()->groupBy('options.id_nb') as $key => $value){
            if($key==$id){
                foreach($value as $item){
                    $insert = DB::table('chi_tiet_hoa_don')->insert(
                        [
                            'id_hd'=>$insert_hd,
                            'id_sp'=>$item->id,
                            'so_luong'=>$item->qty,
                            'gia_sp'=>$item->price,

                        ]
                    );

                }
            }
        }

        foreach(Cart::content()->groupBy('options.id_nb') as $key => $value){
            if($key==$id){
                foreach($value as $item){
                    Cart::remove($item->rowId);
                }
            }
        }
        Session::forget('fee');
        Session::forget('coupon');
        Session::flash("success-checkout", "Đặt hàng thành công");
        return redirect()->route('cart.list');

        return dd('thanh cong');

    }




}
