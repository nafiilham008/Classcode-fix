<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    

    public function kelasMentor()
    {
        // return Kelas::with('users')->where('id_user', Auth()->user()->username)->get();
        return DB::table('kelas')
            ->select('users.*', 'kelas.*')
            // ->join('kelas', 'master_kelas.kelas_id', '=', 'kelas.id')
            ->join('users', 'kelas.id_user', '=', 'users.username')
            ->where(['users.id' => Auth()->user()->id])
            ->get();
    }

    public function index()
    {
        $data = Kelas::all();
        $dataMentor = $this->kelasMentor();
        // dd($data);
        return view('backend.kelas.index', compact(['data', 'dataMentor']));
    }

    public function create()
    {
        return view('backend.kelas.create');
    }

    public function edit($id)
    {
        $data = Kelas::find($id);
        return view('backend.kelas.edit', compact('data'));
    }

    public function hapus($id)
    {
        $data = Kelas::find($id);
        // dd($image);
        $image = public_path('images_kelas/' . $data->image);
        unlink($image);
        $data->delete();
        return redirect()->route('admin.kelas')->with('success', 'Kelas Berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $data = Kelas::find($id);

        // $image = public_path('images_kelas/' . $data->image);
        // unlink($image);

        if ($request->image == '') {
            $request->validate([
                'title' => 'required',
                'url_video' => 'required',
                'description' => 'required',
                'harga' => 'required'
            ]);
            # jika tidak ada request gambar maka
            $data->update([
                'title' => $request->title,
                'url_video' => $request->url_video,
                'slug_url' => str_replace(' ', '-', $request->title),
                'description' => $request->description,
                'harga' => $request->harga
            ]);
        } else {
            # jika ada maka

            $request->validate([
                'title' => 'required',
                'url_video' => 'required',
                'description' => 'required',
                'harga' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $image = public_path('images_kelas/' . $data->image);
            unlink($image);
            $imageName = time() . '.' . $request->image->extension();

            $data->update([
                'title' => $request->title,
                'url_video' => $request->url_video,
                'slug_url' => str_replace(' ', '-', $request->title),
                'description' => $request->description,
                'harga' => $request->harga,
                'image' => $imageName
            ]);
            $request->image->move(public_path('images_kelas/'), $imageName);
        }

        return redirect()->route('admin.kelas')->with('success', 'Kelas Berhasil diupdate');
    }

    public function store(Request $request)
    {
        // validasi data yang mau dimasukkan
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'harga' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        Kelas::create([
            'title' => $request->title,
            'url_video' => $request->url_video,
            'slug_url' => str_replace(' ', '-', $request->title),
            'description' => $request->description,
            'harga' => $request->harga,
            'image' => $imageName,
            'id_user' => auth()->user()->username
        ]);

        $request->image->move(public_path('images_kelas/'), $imageName);

        return redirect()->route('admin.kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }
}
