<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use DB;
use Session;

class CartController extends Controller
{


    public function index(){
        return view('client.cart-list');
    }
    public function AddCart(Request $request ,$id){

         $product = DB::table('san_pham')->where('id',$id)->first();

            $oldCart = Session::has('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $product->id);
            $request->Session()->put('Cart',$newCart);
            // dd($newCart);
        return view('client.cart');

    }

    public function DeleteItemCart(Request $request ,$id){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if(Count($newCart->products)>0){
                $request->Session()->put('Cart',$newCart);
            }else{
                $request->Session()->forget('Cart');
            }
            // dd($newCart);
            return view('client.cart');

    }
    public function DeleteListItemCart(Request $request ,$id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products)>0){
            $request->Session()->put('Cart',$newCart);
        }else{
            $request->Session()->forget('Cart');
        }
        // dd($newCart);
        return view('client.cart-list-ajax');

    }
    public function UpdateCart(Request $request ,$id,$quanty){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateCart($id,$quanty);

            $request->Session()->put('Cart',$newCart);
        // dd($newCart);
        return view('client.cart-list-ajax');

    }




}
