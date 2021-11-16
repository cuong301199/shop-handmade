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
        // Session::flash('fee',30000);
        Session::flash('id_nb',$id);
        return view('client.thanhtoan',compact('tp'));
    }
    public function check_coupon(Request $request){
        $data = $request->coupon;
        $coupon = DB::table('ma_giam_gia')->where('ma_mgg',$data)->first();
        $count_coupon = DB::table('ma_giam_gia')->where('ma_mgg',$data)->count();
        if($coupon){
            // $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avalible = 0;
                    if($is_avalible == 0){
                        $cou[]= array(
                            'coupon_code'=>$coupon->ma_mgg,
                            'coupon_condition'=>$coupon->dieukien_mgg,
                            'coupon_number'=>$coupon->giatri_mgg
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[]= array(
                        'coupon_code'=>$coupon->ma_mgg,
                        'coupon_condition'=>$coupon->dieukien_mgg,
                        'coupon_number'=>$coupon->giatri_mgg
                    );
                    Session::put('coupon',$cou);
                }
                Session::flash("success", "nhập mã giảm giá trành công");
                return redirect()->back();
            }
        }else{
            Session::flash("error", "Mã giảm giá không tồn tại");
                return redirect()->back();
        }

    }

    public function unset_coupon(){
       session::forget('coupon');
       Session::flash("success", "Xóa mã giảm giá thành công");
       return redirect()->back();
    }
    public function check_feeship(Request $request){
        $id_city = $request->id_city;
        $fee = DB::table('phi_van_chuyen')->where('id_tp',$id_city)->first();
        $total_price=$request->total_price;
        $output='';
        if($fee == null){
            Session::flash('fee',50000);
            $fee_ship = 50000;
        }else{
            Session::flash('fee',$fee->phi_pvc);
             $fee_ship=$fee->phi_pvc;
        }
        $total_price+=$fee_ship;
        if(!$id_city==null){
            $output.= '
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Phí giao hàng</label>
                    </div>
                    <div class="col-md-6 no padding-left">
                        <p>'.number_format( Session::get('fee')).' VND</p>
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
                <input  name="fee_ship" type="" value="'. Session::get('fee').'"></input>
                <input  name="total_pice" type="" value="'. $total_price .'"></input>'

            ;
        }
        echo $output;
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
        $tongTien = $request->total_pice;
        // $ttvc = DB::table('thong_tin_van_chuyen')->where('id_nm',$id_nd)->first();
        // $coupon_code = $request->coupon;
        // date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_tp =$request->id_city;
        $id_qh = $request->id_qh;
        $id_xp= $request->id_xp;
        $diachi_ttvc = $request->diaChi;
        $sdt_ttvc = $request->sdt;
        $phiVanChuyen = $request->fee_ship;
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
                'ma_hd'=> 'HN'.rand(0,999).'HM'.rand(),
                'id_nm'=>$id_nd,
                'id_nb'=>$id,
                'ghi_chu'=>$ghiChu,
                'id_pttt'=>$phuongThucThanhToan,
                'tong_sp'=> $tong_sp,
                'id_ttvc'=>$insert_ttvc,
                'tong_tien'=>$tongTien,
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
                            'gia_sp'=>$item->price
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
