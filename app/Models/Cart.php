<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Cart extends Model
class Cart
{
    // use HasFactory;
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;

        }
    }
    public function AddCart($product, $id){
        $newProduct =['quanty'=> 0 , 'price'=>$product->gia_sp, 'productInfor'=>$product];

        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->gia_sp;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->gia_sp;
        $this->totalQuanty++;
    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function UpdateCart($id, $quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty']= $quanty;
        $this->products[$id]['price']=$quanty * $this->products[$id]['productInfor']->gia_sp;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }

}

