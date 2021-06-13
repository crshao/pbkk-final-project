<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $guarded = [];

    //Artinya satu cart punya banyak bahan baku
    public function bahanbakus()
    {
        return $this->hasMany(BahanBaku::class, 'shopping_carts');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'shoppingcart');
    }
}
