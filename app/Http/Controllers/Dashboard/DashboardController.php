<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kelas;
use App\Models\Backend\MasterKelas;
use App\Models\Dashboard\Dashboard;
use App\Models\JoinKelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('join_kelas')
            ->select('kelas.*', 'join_kelas.*')
            ->join('kelas', 'join_kelas.kelas_id', '=', 'kelas.id')
            ->where('join_kelas.user_id', auth()->user()->id)
            ->where('join_kelas.status', '=', 'done')
            ->get();

        return view('dashboard.index', compact('data'));
        // if (auth()->user()->role == "user") {
        //     # code...
        // } else if (auth()->user()->role == "admin") {
        //     # code...
        //     return redirect()->route('admin.index');
        // } else {
        //     # code...
        //     return redirect()->back();
        // }
    }



    public function detail_kelas($slug_url)
    {
        $data = Kelas::where('slug_url', $slug_url)->first();
        if (empty($data)) {
            # jika data kelas kosong atau url tidak ada maka
            return redirect()->route('dashboard.index');
        } else {
            # jika url tersedia maka
            $materi = MasterKelas::where(['kelas_id' => $data->id])->get();
            return view('dashboard.kelas.index', compact('data', 'materi'));
        }
    }

    public function materi($slug_url, $slug_materi)
    {
        // dd($slug_materi);
        $data = Kelas::where('slug_url', $slug_url)->first();
        // dd($data);
        if (empty($data)) {
            # jika data kelas kosong atau url tidak ada maka
            return redirect()->route('dashboard.index');
        } else {
            # jika url tersedia maka
            $materi = MasterKelas::where(['kelas_id' => $data->id])->get();
            $old = DB::table('master_kelas')
                ->select('master_kelas.*')
                ->join('kelas', 'master_kelas.kelas_id', '=', 'kelas.id')
                ->where(['master_kelas.slug_url' => $slug_materi])
                ->first();
           

            return view('dashboard.kelas.materi', compact('data', 'materi', 'old'));
        }
    }
}
