<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
class ChiTietSanPhamController extends Controller
{
    public function index($id){
        if(Auth::guard('nguoi_dung')->check()){
            $id_nd = Auth::guard('nguoi_dung')->user()->id;

            $danhsach = DB::table('san_pham')
            ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
            ->join('nguoi_dung','nguoi_dung.id','san_pham.id_nb')
            ->where('san_pham.id',$id)
            ->select('loai_san_pham.*','nguoi_dung.*','san_pham.*')
            ->first();

            $sp = DB::table('san_pham')
            ->where('id_nb','<>',$danhsach->id_nb)
            ->where('id_lsp',$danhsach->id_lsp)
            ->where('san_pham.id_nb','<>',$id_nd)
            ->where('san_pham.id','<>',$danhsach->id)
            ->take(6)
            ->get();

            $sp_cungcuahang = DB::table('san_pham')
            ->where('id_nb',$danhsach->id_nb)
            ->where('san_pham.id_nb','<>',$id_nd)
            ->where('san_pham.id','<>',$danhsach->id)
            ->take(6)
            ->get();

        }else{
            $danhsach = DB::table('san_pham')
            ->join('loai_san_pham','loai_san_pham.id','san_pham.id_lsp')
            ->join('nguoi_dung','nguoi_dung.id','san_pham.id_nb')
            ->where('san_pham.id',$id)
            ->select('loai_san_pham.*','nguoi_dung.*','san_pham.*')
            ->first();

            $sp = DB::table('san_pham')
            ->where('id_nb','<>',$danhsach->id_nb)
            ->where('id_lsp',$danhsach->id_lsp)
            ->where('san_pham.id','<>',$danhsach->id)
            ->take(6)
            ->get();

            $sp_cungcuahang = DB::table('san_pham')
            ->where('id_nb',$danhsach->id_nb)
            ->where('san_pham.id','<>',$danhsach->id)
            ->take(6)
            ->get();
        }

        $id_oa = DB::table('zalo_chat')->where('id_nd',$danhsach->id_nb)->first();

        $noidung_bc = DB::table('noi_dung_bao_cao')->get();

        $hinhanh = DB::table('hinh_anh')
        ->where('id_sp',$id)
        ->get();


        return view('client.chitietsanpham', compact('danhsach','hinhanh','sp','sp_cungcuahang','noidung_bc','id_oa'));
    }


     public function get_more_comment(Request $request){
        $data = $request->id;
        $id_sp = $request->id_sp;
        if($data>0){
            $comments = DB::table('danh_gia_san_pham')
            ->join('nguoi_dung','nguoi_dung.id','danh_gia_san_pham.id_nd')
            ->where('danh_gia_san_pham.id_sp',$id_sp)
            ->where('danh_gia_san_pham.id','<',$data)
            ->orderBy('danh_gia_san_pham.id','desc')
            ->select('nguoi_dung.*','danh_gia_san_pham.*')
            ->take(1)
            ->get();

        }else{
            $comments = DB::table('danh_gia_san_pham')
            ->join('nguoi_dung','nguoi_dung.id','danh_gia_san_pham.id_nd')
            ->where('danh_gia_san_pham.id_sp',$id_sp)
            ->orderBy('danh_gia_san_pham.id','desc')
            ->select('nguoi_dung.*','danh_gia_san_pham.*')
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
            <button id="load-more-button" data-id = "'.$last_id.'" style="color:#333; background-color:#9b9999;border:#fff;font-size:12px;" type="button" class="btn btn-success from-control">Xem thêm</button>
        </div>';

        echo $output;
    }

    public function comment_product(Request $request){
        $id_nd=Auth::guard('nguoi_dung')->user()->id;
        $comment = $request ->comment;
        $id_sp = $request->id_sp;

        $insert = DB::table('danh_gia_san_pham')->insert(
            [
                'id_sp'=>$id_sp,
                'id_nd'=>$id_nd,
                'noidung_dg'=>$comment,
                'created_at'=> Carbon::now('Asia/Ho_Chi_Minh')
            ]
        );

    }
}
