<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

use Carbon\Carbon;
class CuaHangController extends Controller
{

    public function index(Request $request ,$id){
        $thongtin = DB::table('nguoi_dung')
        ->where('id',$id)
        ->first();
        $danhmuc = DB::table('danh_muc')
        ->get();
        $sanpham = DB::table('san_pham')
        ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
        ->join('danh_muc','danh_muc.id','loai_san_pham.id_dm')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','san_pham.id_tp')
        ->where('id_nb',$id)
        ->select('tbl_tinhthanhpho.*','danh_muc.*','loai_san_pham.*','san_pham.*')
        ->get();
        $infor = DB::table('thong_tin_lien_he')
        ->join('nguoi_dung','nguoi_dung.id','thong_tin_lien_he.id_nd')
        ->where('thong_tin_lien_he.id_nd',$id)
        ->first();

        $post = DB::table('bai_viet')
        ->where('id_nd',$id)
        ->get();
        if($request->oderBy){
            $oderBy = $request->oderBy;
            if($oderBy=='asc'){
                $sanpham = $sanpham->sortBy('id');
            }else if($oderBy=='desc'){
                $sanpham = $sanpham->sortByDesc('id');
            } if($oderBy=='price_max'){
                $sanpham = $sanpham->sortByDesc('gia_sp');
            } if($oderBy=='price_min'){
                $sanpham = $sanpham->sortBy('gia_sp')  ;
            }
        }
        if($request->id_cat){
            $id_cat= $request->id_cat;
            $sanpham = $sanpham->where('id_dm',$id_cat);
        }
        return view('client.cuahang.index' ,compact('thongtin','sanpham','post','danhmuc','infor'));
    }

    public function load_rate(Request $request){
        $data = $request->id;
        $id_nb = $request->id_nb;

        if($data>0){
            $comments = DB::table('danh_gia_nguoi_dung')
            ->join('nguoi_dung','nguoi_dung.id','danh_gia_nguoi_dung.id_nm')
            ->where('danh_gia_nguoi_dung.id_nb',$id_nb)
            ->where('danh_gia_nguoi_dung.id','<',$data)
            ->orderBy('danh_gia_nguoi_dung.id','desc')
            ->select('nguoi_dung.*','danh_gia_nguoi_dung.*')
            ->take(1)
            ->get();
        }else{
            $comments = DB::table('danh_gia_nguoi_dung')
            ->join('nguoi_dung','nguoi_dung.id','danh_gia_nguoi_dung.id_nm')
            ->where('danh_gia_nguoi_dung.id_nb',$id_nb)
            ->orderBy('danh_gia_nguoi_dung.id','desc')
            ->select('nguoi_dung.*','danh_gia_nguoi_dung.*')
            ->take(1)
            ->get();
        }

        $output = '';
        foreach($comments as $key => $comment){
            $last_id = $comment->id;
            $output.='<li class="media">
            <a class="pull-left" href="#">
                <img width="100px" height="90px" class="media-object"
                    src="'. asset($comment->anhdaidien_nd).'" alt="" />
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="#">'.$comment->ten_nd.'</a> <span>'.\Carbon\Carbon::parse($comment->created_at)->subHours(7)->diffForHumans().'</span></h4>
                <p>'.$comment->noidung_dg.'</p>
            </div>
        </li>';
        }
        $output .= '
        <div class="col-md-12 center-block text-center" >
            <button id="load-more-button" data-id ="'.$last_id.'" style="color:#333; background-color:#9b9999;border:#fff;font-size:12px;" type="button" class="btn btn-success from-control">Xem thêm</button>
        </div>';

        echo $output;
    }


    public function rate_user(Request $request){
        $id_nd=Auth::guard('nguoi_dung')->user()->id;
        $comment = $request ->comment;
        $id_nb = $request->id_nb;

        $insert = DB::table('danh_gia_nguoi_dung')->insert(
            [
                'id_nb'=>$id_nb,
                'id_nm'=>$id_nd,
                'noidung_dg'=>$comment,
                'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
            ]
        );
    }
    // public function index(){
    //     return view('admin.cuahang.index');
    // }

    // public function getStore(){
    //     $danhsach = DB::table('cua_hang')
    //     ->join('nguoi_dung','nguoi_dung.id','cua_hang.id_nd')
    //     // ->select('ten_dm','ten_lsp','id_dm',)
    //     ->select('cua_hang.*','ten_nd')
    //     ->get();
    //      return view('admin.cuahang.index', compact('danhsach'));


    // }

    // public function accepStore($id){
    //     $idQuanTri = Auth::guard('quan_tri')->user()->id;
    //     $update=DB::table('cua_hang')->where('id',$id)->update([
    //         'trangthai_ch'=>1,
    //         'id_qt'=>$idQuanTri,
    //     ]);
    //     $update_nd= DB::table('nguoi_dung')
    //     ->join('cua_hang','cua_hang.id_nd','nguoi_dung.id')
    //     ->where('cua_hang.id',$id)->update([
    //         'id_q'=>3,
    //     ]);
    //     return redirect()->back();
    // }

    // public function stopStore($id){
    //     $idQuanTri = Auth::guard('quan_tri')->user()->id;
    //     $update=DB::table('cua_hang')->where('id',$id)->update([
    //         'trangthai_ch'=>2,
    //         'id_qt'=>$idQuanTri,
    //     ]);
    //     $update_nd= DB::table('nguoi_dung')
    //     ->join('cua_hang','cua_hang.id_nd','nguoi_dung.id')
    //     ->where('cua_hang.id',$id)->update([
    //         'id_q'=>2,
    //     ]);
    //     return redirect()->back();
    // }

    // public function showStore($id){
    //     $cuahang = DB::table('cua_hang')
    //     ->where('id',$id)
    //     ->first();

    //     $sanpham = DB::table('san_pham')
    //     ->join('cua_hang','cua_hang.id','san_pham.id_ch')
    //     ->where('san_pham.id_ch',$id)
    //     ->get();

    //     return view('client.cuahang',compact('cuahang','sanpham'));
    //     }
}
