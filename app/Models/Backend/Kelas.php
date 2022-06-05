<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'slug_url',
        'url_video',
        'title',
        'description',
        'harga',
        'image'
    ];
}
