<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kelas;
use App\Models\Backend\Promo;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $dataKelas = Kelas::count();

        $dataPromo = Promo::count();

        $dataUser = User::count();

        return view('backend.admin.index', compact('dataKelas', 'dataPromo', 'dataUser'));
    }

//     public function tampilPromo()
//     {
//         $dataPromo = Promo::count();

//         return view('backend.admin.index', compact('dataPromo'));
//     }
}
