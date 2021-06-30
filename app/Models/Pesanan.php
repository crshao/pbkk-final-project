<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = ['id_user', 'state', 'id_courier'];

    public function couriers() {
        return $this->belongsTo(Courier::class);
    }
}
