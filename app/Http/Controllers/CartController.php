<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
class CartController extends Controller
{


    public function index(){
        return view('client.cart');
    }
    public function AddCart(Request $request ,$id){
        $product = DB::table('san_pham')->where('id',$id)->first();
        Cart::add($product->id,$product->ten_sp, 1,$product->gia_sp,'770', ['id_nb' => $product->id_nb,'duongdan_ha' => $product->hinhanh_sp]);
        Session::flash("success","Thêm thành công");
        return \redirect()->back();
        // Cart::destroy();
    }

    public function DeleteItemCart(Request $request ,$rowId){
        Cart::remove($rowId);
        Session::flash("success-deleteItemCart","Xóa thành công");
        return redirect()->back();
    }
    // public function DeleteListItemCart(Request $request ,$id){
    //     $oldCart = Session('Cart') ? Session('Cart') : null;
    //     $newCart = new Cart($oldCart);
    //     $newCart->DeleteItemCart($id);
    //     if(Count($newCart->products)>0){
    //         $request->Session()->put('Cart',$newCart);
    //     }else{
    //         $request->Session()->forget('Cart');
    //     }
    //     // dd($newCart);
    //     return view('client.cart-list-ajax');

    // }
    public function UpdateCart(Request $request ){
        $qty = $request->qty;
        $rowId = $request->rowId;
        Cart::update($rowId,$qty);
        Session::flash("success","Thêm thành công");
    }


    // public function total_item(){
    //     Cart()::content()->groupBy('options.id_nb');
    //     foreach (Cart::content()->groupBy('options.id_nb') as $item => $key){
    //         foreach($key as $value){
    //             $total+=$value->qty * $value->price;
    //         }
    //     }
    // }

}
