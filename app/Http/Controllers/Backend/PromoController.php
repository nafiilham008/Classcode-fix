<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promo::all();
        return view('backend.promo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.promo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kode_promo' => 'required',
            'diskon' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        Promo::create([
            'title' => $request->title,
            'kode_promo' => $request->kode_promo,
            'diskon' => $request->diskon,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName
        ]);

        $request->image->move(public_path('images_kupon'), $imageName);
        return redirect()->route('admin.promo');
    }

    public function hapus($id)
    {
        $data = Promo::find($id);
        $data->delete();
        return redirect()->route('admin.promo')->with('success', 'Promo Berhasil dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Promo::find($id);
        return view('backend.promo.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Promo::find($id);

        if ($request->image == '') {
            // Jika tidak ubah gambar
            $request->validate([
                'title' => 'required',
                'kode_promo' => 'required',
                'diskon' => 'required',
                'deskripsi' => 'required'
            ]);

            $data->update([
                'title' => $request->title,
                'kode_promo' => $request->kode_promo,
                'diskon' => $request->diskon,
                'deskripsi' => $request->deskripsi
            ]);
        } else {
            // jika ubah gambar
            $request->validate([
                'title' => 'required',
                'kode_promo' => 'required',
                'diskon' => 'required',
                'deskripsi' => 'required',
                'image' => 'required|image|mimes:jpg,png'
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $data->update([
                'title' => $request->title,
                'kode_promo' => $request->kode_promo,
                'diskon' => $request->diskon,
                'deskripsi' => $request->deskripsi,
                'image' => $imageName
            ]);

            $request->image->move(public_path('images_kupon'), $imageName);
            return redirect()->route('admin.promo');
        }






        return redirect()->route('admin.promo')->with('success', 'Promo Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
