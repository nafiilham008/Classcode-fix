<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinKelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas_id',
        'user_id',
        'status',
        'checkout_id'
    ];
}
