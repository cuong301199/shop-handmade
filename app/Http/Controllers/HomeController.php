<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Carbon\Carbon;
use number_format;
class HomeController extends Controller
{

    public function get_more_product(Request $request){
        $data = $request->id;
        if($data>0){
            $danhsachsanpham = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->where('san_pham.id','<',$data)
            ->orderBy('san_pham.id','desc')
            ->select('tbl_tinhthanhpho.*','san_pham.*')
            ->take(6)
            ->get();
        }else
            $danhsachsanpham = DB::table('san_pham')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
            ->orderBy('san_pham.id','desc')
            ->select('tbl_tinhthanhpho.*','san_pham.*')
            ->take(6)
            ->get();
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
                                <a id="{{ $item->id }}" class="addcart" href="'. route('Add.cart', ['id'=>$pro->id]) .'"><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';


        }
        $output .= '
            <div class="col-md-12 center-block text-center" >
                <button id="load-more-button" data-id = "'.$last_id.'" style="color:rgb(25, 49, 185); background-color:#fff;border:#fff;font-size:16px;" type="button" class="btn btn-success from-control">Xem thêm</button>
            </div>';
        echo $output;

    }
    public function index(){
        $danhsachsanpham = DB::table('san_pham')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp') //
        ->select('tbl_tinhthanhpho.*','san_pham.*')
        // ->select('id_lsp', DB::raw('count(*) as total'))
        // ->groupBy('id_lsp')
        // ->having('id_lsp', '<', 2)

        ->get();
        $report = DB::table('bao_cao_san_pham')
        ->select('id_sp', DB::raw('count(*) as total'))
        ->groupBy('id_sp')->get();
        // ->having('id_lsp','>',2);
        $danhmuc = DB::table('danh_muc')
        ->get();
        // $now = Carbon::now();
        return view('client.index',compact('danhsachsanpham','danhmuc','report'));
    }
    public function searchProduct(Request $request){
        $tp = DB::table('tbl_tinhthanhpho')
        ->get();
        $key = $request->search;
        $search_product = DB::table('san_pham')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
        ->where('ten_sp','like','%'.$key.'%')
        ->paginate(16)->appends(request()->query());

        if($request->id_city){
            $id_city = $request->id_city;
            $search_product =  $search_product->where('matp',$id_city);
        }
        if($request->price){
            $price = $request->price;
            if($price==1){
                $search_product =  $search_product->where('gia_sp','<',500000);
            }elseif($price==2){
                $search_product =  $search_product->whereBetween('gia_sp',[500000,1000000]);
            }elseif($price==3){
                $search_product =  $search_product->whereBetween('gia_sp',[1000000,1500000]);
            }elseif($price==4){
                $search_product =  $search_product->whereBetween('gia_sp',[1500000,2000000]);
            }elseif($price==5){
                $search_product = $search_product->where('gia_sp','>',2000000);
            }
        }
        if($request->oderBy){
            $oderBy = $request->oderBy;
            if($oderBy=='asc'){
                $search_product =  $search_product->sortBy('id');
            }else if($oderBy=='desc'){
                $search_product =  $search_product->sortByDesc('id');
            } if($oderBy=='price_max'){
                $search_product =  $search_product->sortByDesc('gia_sp');
            } if($oderBy=='price_min'){
                $search_product = $search_product->sortBy('gia_sp')  ;
            }
        }
        return view('client.timkiem.timkiem',compact('search_product','tp'));
    }

    public function index_post($id){
        $post = DB::table('bai_viet')
        ->join('nguoi_dung','nguoi_dung.id','bai_viet.id_nd')
        ->where('bai_viet.id',$id)
        ->select('nguoi_dung.*','bai_viet.*')
        ->first();
        return view('client.baiviet',\compact('post'));
    }
}
