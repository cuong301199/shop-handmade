<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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
    public function AddCart($product , $id){
        $newProduct =['quanty'=>0 , 'price'=>0, 'productInfor'=>$product];
        if($this->products){
            if(array_key_exists($id , $this-> products)){
                $newProduct = $this->$products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty']* $product->gia_sp;
        $this->products['$id'] = $newProduct;
        $this->totalPrice += $product->gia_sp;
        $this->totalQuanty ++;
    }



}

