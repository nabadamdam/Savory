<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getAllCarts(){
        return \DB::table($this->table)
                ->orderBy('created_at', 'desc')
                ->get();
    }

    public function updateCartDelivered($id){
        return \DB::table($this->table)
                ->where('id',$id)
                ->update(['status' => 'Delivered']);
    }
}
