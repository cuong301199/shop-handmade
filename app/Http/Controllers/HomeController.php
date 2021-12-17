<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Auth;
use Carbon\Carbon;
use number_format;
class HomeController extends Controller
{

    public function get_more_product(Request $request){

        $data = $request->id;
        if($data>0){
            if( Auth::guard('nguoi_dung')->check()){
                $id_nd = Auth::guard('nguoi_dung')->user()->id;
                $danhsachsanpham = DB::table('san_pham')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
                ->where('san_pham.id','<',$data)
                ->where('san_pham.id_nb','<>',$id_nd)
                ->orderBy('san_pham.id','desc')
                ->select('tbl_tinhthanhpho.*','san_pham.*')
                ->take(12)
                ->get();
            }else{
                $danhsachsanpham = DB::table('san_pham')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
                ->where('san_pham.id','<',$data)
                ->orderBy('san_pham.id','desc')
                ->select('tbl_tinhthanhpho.*','san_pham.*')
                ->take(12)
                ->get();
            }
        }else{
            if(Auth::guard('nguoi_dung')->check()){
                $id_nd = Auth::guard('nguoi_dung')->user()->id;
                $danhsachsanpham = DB::table('san_pham')
                    ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
                    ->orderBy('san_pham.id','desc')
                    ->where('san_pham.id_nb','<>',$id_nd)
                    ->select('tbl_tinhthanhpho.*','san_pham.*')
                    ->take(12)
                    ->get();
            }else{
                $danhsachsanpham = DB::table('san_pham')
                    ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
                    ->orderBy('san_pham.id','desc')
                    ->select('tbl_tinhthanhpho.*','san_pham.*')
                    ->take(12)
                    ->get();
            }
        }
        // }else
        //     $danhsachsanpham = DB::table('san_pham')
        //     ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
        //     ->orderBy('san_pham.id','desc')
        //     ->where('san_pham.id_nb','<>',$id_nd)
        //     ->select('tbl_tinhthanhpho.*','san_pham.*')
        //     ->take(6)
        //     ->get();
        $output = '';

        foreach($danhsachsanpham as $key => $pro){
            $last_id = $pro->id;
            if($pro->soluong_sp > 0){
            $output.='<div id="new" class="tab-pane fade in active">
                    <div class="col-md-2 col-sm-6">
                        <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                            <div class="product-img">
                                <a href = "'.route('chitietsanpham.index', ['id'=>$pro->id]).'"><img height="100px" class="img-responsive" alt="Single product" src="'.$pro->hinhanh_sp.'"></a>
                            </div>
                            <div class="product-info">
                                <h2>'.Str::limit($pro->ten_sp, 13).'</h2>
                                <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)">'.number_format($pro->gia_sp).' VDN</span>
                                <p><i class="fa fa-clock"></i>'. \Carbon\Carbon::parse($pro->created_at)->subHours(7)->diffForHumans().'</p>
                                <p><i class="fa fa-map-marker-alt"></i>'.Str::limit($pro->name_tp, 15).'</p>
                                <a id="{{ $item->id }}" class="addcart" href="'. route('Add.cart', ['id'=>$pro->id]) .'"><i class="fa fa-cart-plus"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }else{
                $output.='<div id="new" class="tab-pane fade in active">
                <div class="col-md-2 col-sm-6">
                    <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                        <div class="product-img">
                            <a href = "'.route('chitietsanpham.index', ['id'=>$pro->id]).'"><img height="100px" class="img-responsive" alt="Single product" src="'.$pro->hinhanh_sp.'"></a>
                        </div>
                        <div class="product-info">
                            <h2>'.Str::limit($pro->ten_sp, 13).'</h2>
                            <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)">'.number_format($pro->gia_sp).' VDN</span>
                            <p><i class="fa fa-clock"></i>'. \Carbon\Carbon::parse($pro->created_at)->subHours(7)->diffForHumans().'</p>
                            <p><i class="fa fa-map-marker-alt"></i>'.Str::limit($pro->name_tp, 15).'</p>
                            <p id="out-of" style="color:#939098;cursor:pointer;"><i class="fa fa-cart-plus"></i>Thêm vào giỏ hàng</p>
                        </div>
                    </div>
                </div>
                </div>';

            }
        }
        $output .= '
            <div class="col-md-12 center-block text-center" >
                <button id="load-more-button" data-id = "'.$last_id.'" style="color:#343c66; width:100%; background-color:#f5f4f4cf;border:#fff;font-size:16px;" type="button" class="btn btn-success from-control">Xem thêm</button>
            </div>';
        echo $output;

    }
    public function get_more_product_like(Request $request){
        $data = $request->id;
        if($data> 0){
            if(Auth::guard('nguoi_dung')->check()){
                $id_nd = Auth::guard('nguoi_dung')->user()->id;
                $lsp = DB::table('loaisanpham_yeuthich')->where('id_nd',$id_nd)->first();
                $danhsachsanpham = DB::table('san_pham')
                ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
                ->where('san_pham.id','<',$data)
                ->where('san_pham.id_nb','<>',$id_nd)
                ->where('san_pham.id_lsp',$lsp->id_lsp)
                ->orderBy('san_pham.id','desc')
                ->select('tbl_tinhthanhpho.*','san_pham.*')
                ->take(12)
                ->get();
            }
        }else{
            $id_nd = Auth::guard('nguoi_dung')->user()->id;
            $lsp = DB::table('loaisanpham_yeuthich')->where('id_nd',$id_nd)->first();
            $danhsachsanpham = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('san_pham.id_nb','<>',$id_nd)
            ->where('san_pham.id_lsp',$lsp->id_lsp)
            ->orderBy('san_pham.id','desc')
            ->select('tbl_tinhthanhpho.*','san_pham.*')
            ->take(12)
            ->get();
        }
        $output = '';
        foreach($danhsachsanpham as $key => $pro){
            $last_id = $pro->id;
            $output.='<div id="new" class="tab-pane fade in active">
                    <div class="col-md-2 col-sm-6">
                        <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                            <div class="product-img">
                                <a href = "'.route('chitietsanpham.index', ['id'=>$pro->id]).'"><img height="100px" class="img-responsive" alt="Single product" src="'.$pro->hinhanh_sp.'"></a>
                            </div>
                            <div class="product-info">
                                <h2>'.Str::limit($pro->ten_sp, 13).'</h2>
                                <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)">'.number_format($pro->gia_sp).' VDN</span>
                                <p><i class="fa fa-clock"></i>'. \Carbon\Carbon::parse($pro->created_at)->subHours(7)->diffForHumans().'</p>
                                <p><i class="fa fa-map-marker-alt"></i>'.Str::limit($pro->name_tp, 15).'</p>
                                <a id="{{ $item->id }}" class="addcart" href="'. route('Add.cart', ['id'=>$pro->id]) .'"><i class="fa fa-cart-plus"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        $output .= '
        <div class="col-md-12 center-block text-center" >
            <button id="load-more-button-like" data-id = "'.$last_id.'" style="color:#343c66; width:100%; background-color:#f5f4f4cf;border:#fff;font-size:16px;" type="button" class="btn btn-success from-control">Xem thêm</button>
        </div>';
        echo $output;
    }
    public function index(){
        // $id_nd = Auth::guard('nguoi_dung')->user()->id;
        // $lsp = DB::table('loaisanpham_yeuthich')->where('id_nd',$id_nd)->first();
        // $danhsachsanpham = DB::table('san_pham')
        //         ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
        //         ->where('san_pham.id_nb','<>',$id_nd)
        //         ->where('san_pham.id_lsp',$lsp->id_lsp)
        //         ->orderBy('san_pham.id','desc')
        //         ->select('tbl_tinhthanhpho.*','san_pham.*')
        //         ->get();
        $danhmuc = DB::table('danh_muc')
        ->get();
        return view('client.index',compact('danhmuc'));
    }
    public function searchProduct(Request $request){
        $key = $request->search;
        if(Auth::guard('nguoi_dung')->check()){
            $id_nd = Auth::guard('nguoi_dung')->user()->id;
            $search_product = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('ten_sp','like','%'.$key.'%')
            ->where('san_pham.id_nb','<>',$id_nd)
            ->select('tbl_tinhthanhpho.*','san_pham.*');

            $tp = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('ten_sp','like','%'.$key.'%')
            ->where('san_pham.id_nb','<>',$id_nd)
            ->groupBy('id_tp')->get();

             $search_product2 = $search_product->paginate(16)->appends(request()->query());
        }else{
            $search_product = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('ten_sp','like','%'.$key.'%')
            ->select('tbl_tinhthanhpho.*','san_pham.*');

            $tp = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('ten_sp','like','%'.$key.'%')
            ->groupBy('id_tp')->get();

             $search_product2 = $search_product->paginate(16)->appends(request()->query());
        }


        if($request->id_city){
            $id_city = $request->id_city;
            $search_product2 =  $search_product->where('matp',$id_city)->paginate(16)->appends(request()->query());
        }
        if($request->price){
            $price = $request->price;
            if($price==1){
                $search_product2 =  $search_product->where('gia_sp','<',500000)->paginate(16)->appends(request()->query());
            }elseif($price==2){
                $search_product2 =  $search_product->whereBetween('gia_sp',[500000,1000000])->paginate(16)->appends(request()->query());
            }elseif($price==3){
                $search_product2 =  $search_product->whereBetween('gia_sp',[1000000,1500000])->paginate(16)->appends(request()->query());
            }elseif($price==4){
                $search_product2 =  $search_product->whereBetween('gia_sp',[1500000,2000000])->paginate(16)->appends(request()->query());
            }elseif($price==5){
                $search_product2 = $search_product->where('gia_sp','>',2000000)->paginate(16)->appends(request()->query());
            }
        }
        if($request->oderBy){
            $oderBy = $request->oderBy;
            if($oderBy=='asc'){
                $search_product2 =  $search_product->orderBy('id','asc')->paginate(16)->appends(request()->query());
            }else if($oderBy=='desc'){
                $search_product2 =  $search_product->orderBy('id','desc')->paginate(16)->appends(request()->query());
            } if($oderBy=='price_max'){
                $search_product2 =  $search_product->orderBy('gia_sp','desc')->paginate(16)->appends(request()->query());
            } if($oderBy=='price_min'){
                $search_product2 = $search_product->orderBy('gia_sp','asc')->paginate(16)->appends(request()->query());
            }
        }
        return view('client.timkiem.timkiem',compact('search_product2','tp'));
    }

    public function index_post($id){
        $post = DB::table('bai_viet')
        ->join('nguoi_dung','nguoi_dung.id','bai_viet.id_nd')
        ->where('bai_viet.id',$id)
        ->select('nguoi_dung.*','bai_viet.*')
        ->first();
        return view('client.baiviet',\compact('post'));
    }

    public function chat(){
        return view('client.chat');
    }

    public function accepFile(Request $request){
        if($request->hasFile('file')){
           return " có file";
        }else{
            return " không có file";
        }
    }
}
