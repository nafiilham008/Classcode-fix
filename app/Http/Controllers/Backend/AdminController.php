<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kelas;
use App\Models\Backend\Promo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function checkMentor()
    {
        return User::role('mentor')->get()->count();
        
    }

    public function checkUser()
    {
        return User::role('user')->get()->count();
        
    }

    public function checkKelas()
    {
        $user = auth::user();
        return Kelas::where('id_user', $user->username)->count();
        
    }



    public function index()
    {
        // dd($this->checkKelas());
        $dataKelas = Kelas::count();

        $dataUser = $this->checkUser();

        $dataMentor = $this->checkMentor();

        $dataKelasMentor = $this->checkKelas();

        return view('backend.admin.index', compact('dataKelas', 'dataMentor', 'dataUser', 'dataKelasMentor'));
    }

//     public function tampilPromo()
//     {
//         $dataPromo = Promo::count();

//         return view('backend.admin.index', compact('dataPromo'));
//     }
}
