<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kelas;
use App\Models\Backend\MasterKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug_url)
    {
        $kelas = Kelas::where('slug_url', $slug_url)->first();
        if (empty($kelas)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $data = DB::table('master_kelas')
                ->select('users.username', 'kelas.title', 'master_kelas.*')
                ->join('kelas', 'master_kelas.kelas_id', '=', 'kelas.id')
                ->join('users', 'master_kelas.user_id', '=', 'users.id')
                ->where(['master_kelas.kelas_id' => $kelas->id])
                ->get();

            return view('backend.masterkelas.index', compact('data', 'kelas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug_url)
    {
        $kelas = Kelas::where('slug_url', $slug_url)->first();
        if (empty($kelas)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $data = Kelas::all();
            return view('backend.masterkelas.create', compact('data', 'kelas'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug_url)
    {
        $kelas = Kelas::where('slug_url', $slug_url)->first();
        if (empty($kelas)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $request->validate([
                'title' => 'required',
                'url_video' => 'required'
            ]);

            MasterKelas::create([
                'kelas_id' => $kelas->id,
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'url_video' => $request->url_video,
                'slug_url' => str_replace(' ', '-', $request->title),
            ]);

            return redirect()->route('admin.masterkelas.index', $kelas->slug_url)->with('success', 'Data berhasil diupload');

            // dd($request->all());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug_url, $id)
    {
        $kelas = Kelas::where('slug_url', $slug_url)->first();
        if (empty($kelas)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $data = MasterKelas::find($id);
            return view('backend.masterkelas.edit', compact('data', 'kelas'));
            // dd($data);
        }
    }

    public function hapus($slug_url, $id)
    {
        $kelas = Kelas::where('slug_url', $slug_url)->first();
        if (empty($kelas)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $data = MasterKelas::find($id);

            $data->delete();

            return redirect()->route('admin.masterkelas.index', $kelas->slug_url)->with('success', 'Data berhasil diupload');
            // dd($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug_url, $id)
    {
        $kelas = Kelas::where('slug_url', $slug_url)->first();
        if (empty($kelas)) {
            // Jika kelas kosong
            return redirect()->back();
        } else {
            # Jika kelas ada
            $request->validate([
                'title' => 'required',
                'url_video' => 'required'
            ]);

            $data = MasterKelas::find($id);

            $data->update([
                'title' => $request->title,
                'url_video' => $request->url_video,
                'slug_url' => str_replace(' ', '-', $request->title),
            ]);

            return redirect()->route('admin.masterkelas.index', $kelas->slug_url)->with('success', 'Data berhasil diupload');
        }
    }
}
