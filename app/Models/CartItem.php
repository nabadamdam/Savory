<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';

    public function getCartItemsOfCart($id){
        return \DB::table($this->table)
                ->where('cart_id',$id)
                ->get();
    }
}
