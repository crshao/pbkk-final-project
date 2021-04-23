<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahanbaku extends Model
{
    use HasFactory;

    protected $table = 'bahanbakus';
    protected $guarded = [];

    //Artinya 1 bahan baku dapat menjadi bagian
    //dari beberapa resep
    public function reseps()
    {
        return $this->belongsToMany(Resep::class);
    }

}
