<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'reseps';
    
    //Artinya satu resep punya banyak bahan baku
    public function bahanbakus()
    {
        return $this->hasMany(BahanBaku::class);
    }
}
