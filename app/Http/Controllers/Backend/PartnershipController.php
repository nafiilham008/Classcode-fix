<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        $data = Partnership::all();
        return view('backend.partnership.index', compact('data'));
    }

    public function create()
    {
        return view('backend.partnership.create');
    }

    public function edit($id)
    {
        $data = Partnership::find($id);
        return view('backend.partnership.edit', compact('data'));
    }

    public function hapus($id)
    {
        $data = Partnership::find($id);
        $image = public_path('images_partner/' . $data->logo);
        unlink($image);
        // dd($image);
        $data->delete();
        return redirect()->route('admin.partner')->with('success', 'Partner Berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $data = Partnership::find($id);

        // $image = public_path('images_kelas/' . $data->image);
        // unlink($image);

        if ($request->image == '') {
            $request->validate([
                'name' => 'required'
            ]);
            # jika tidak ada request gambar maka
            $data->update([
                'name' => $request->name
            ]);
        } else {
            # jika ada maka
            
            $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $image = public_path('images_partner/' . $data->logo);
            unlink($image);
            $imageName = time() . '.' . $request->image->extension();

            $data->update([
                'name' => $request->name,
                'logo' => $imageName
            ]);
            $request->image->move(public_path('images_partner/'), $imageName);
        }

        return redirect()->route('admin.partner')->with('success', 'Partner Berhasil diupdate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        Partnership::create([
            'name' => $request->name,
            'logo' => $imageName
        ]);

        $request->image->move(public_path('images_partner/'), $imageName);

        return redirect()->route('admin.partner');
    }
}
