<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\JoinKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingKelasController extends Controller
{

    public function joinTable()
    {
        return DB::table('join_kelas')
                ->select('users.username', 'kelas.*', 'join_kelas.*', 'checkouts.image_trx')
                ->join('kelas', 'join_kelas.kelas_id', '=', 'kelas.id')
                ->join('users', 'join_kelas.user_id', '=', 'users.id')
                ->join('checkouts', 'join_kelas.checkout_id', '=', 'checkouts.id')
                ->where(['join_kelas.status' => 'pending'])
                ->get();
    }

    public function index()
    {
        // dd($this->joinTable());
        $data = $this->joinTable();

        return view('backend.pending.index', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        // $dataIndex = $this->joinTable();
        $data = JoinKelas::find($id);
        // $data = $this->joinTable();
        
        $request->validate([
            'status' => 'required',
        ]);
        
        
        // dd($request->all());

        $data->update([
            'status' => $request->status
        ]);
        // JoinKelas::create([
        //     'kelas_id' => $kelas->id,
        //     'user_id' => auth()->user()->id,
        //     'title' => $request->title,
        //     'url_video' => $request->url_video,
        //     'slug_url' => str_replace(' ', '-', $request->title),
        // ]);

        // return redirect()->back()->with('success','Status berhasil diupdate');
        return redirect()->route('admin.pending.kelas')->with('success', 'Status berhasil diupdate');

        // dd($request->all());
    }
}
