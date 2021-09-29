<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use DB;
use Session;
class CartController extends Controller
{
    public function AddCart(Request $request ,$id){

        $product = DB::table('san_pham')->where('id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $request->Session()->put('Cart',$newCart);
            // dd($newCart);
        }

        return view('client.cart',compact('newCart'));

    }

}
