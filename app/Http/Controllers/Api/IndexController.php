<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kelas;
use App\Models\Backend\Promo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function kelas()
    {
        $data = Kelas::all();
        if (empty($data)) {
            # jika kelas tidak ada maka
            return response()->json([
                'message' => 'error',
                'data' => 'Kelas Not Found'
            ]);
        } else {
            # jika kelas ada maka
            return response()->json([
                'message' => 'success',
                'data' => $data
            ]);
        }
        
    }

    public function kelas_detail($id)
    {
        $data = Kelas::find($id);
        if (empty($data)) {
            # jika kelas tidak ada maka
            return response()->json([
                'message' => 'error',
                'data' => 'Kelas Not Found'
            ]);
        } else {
            # jika kelas ada maka
            return response()->json([
                'message' => 'success',
                'data' => $data
            ]);
        }
        
    }

    public function promo()
    {
        $data = Promo::all();
        if (empty($data)) {
            # jika kelas tidak ada maka
            return response()->json([
                'message' => 'error',
                'data' => 'Kelas Not Found'
            ]);
        } else {
            # jika kelas ada maka
            return response()->json([
                'message' => 'success',
                'data' => $data
            ]);
        }
        
    }
}
