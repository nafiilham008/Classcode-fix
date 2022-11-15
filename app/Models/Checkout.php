<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas_id',
        'user_id',
        'harga',
        'kode_promo',
        'diskon',
        'payment_id',
        'status',
        'image_trx'
    ];
}
