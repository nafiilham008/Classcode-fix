<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas_id',
        'user_id',
        'title',
        'url_video',
        'slug_url'
    ];
}
