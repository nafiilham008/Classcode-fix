<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = Payment::all();

        return view('backend.payment.index', compact('data'));
    }

    public function create()
    {
        return view('backend.payment.create');
    }

    public function edit($id)
    {
        $data = Payment::find($id);
        return view('backend.payment.edit', compact('data'));
    }

    public function hapus($id)
    {
        $data = Payment::find($id);
        
        $logo = public_path('logo_bank/' . $data->logo);
        unlink($logo);

        $data->delete();
        return redirect()->route('admin.payment')->with('success', 'payment Berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $data = Payment::find($id);

        if ($request->logo == '') {
            $request->validate([
                'name' => 'required',
                'nomer' => 'required',
                'atas_nama' => 'required'
            ]);
            # jika tidak ada request gambar maka
            $data->update([
                'name' => $request->name,
                'nomer' => $request->nomer,
                'atas_nama' => $request->atas_nama
            ]);
        } else {
            # jika ada maka
            $logo = public_path('logo_bank/' . $data->logo);
            unlink($logo);

            $request->validate([
                'name' => 'required',
                'nomer' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'atas_nama' => 'required'
            ]);

            $logoName = time() . '.' . $request->logo->extension();

            $data->update([
                'name' => $request->name,
                'nomer' => $request->nomer,
                'logo' => $logoName,
                'atas_nama' => $request->atas_nama
            ]);
            $request->logo->move(public_path('logo_bank'), $logoName);
        }

        return redirect()->route('admin.payment')->with('success', 'payment Berhasil diupdate');
    }

    public function store(Request $request)
    {
        // validasi data yang mau dimasukkan
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'nomer' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'atas_nama' => 'required'
        ]);

        $logoName = time() . '.' . $request->logo->extension();

        Payment::create([
            'name' => $request->name,
            'nomer' => $request->nomer,
            'logo' => $logoName,
            'atas_nama' => $request->atas_nama
        ]);

        $request->logo->move(public_path('logo_bank'), $logoName);
        return redirect()->route('admin.payment');
    }
}
