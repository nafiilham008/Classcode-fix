<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('backend.user.index', compact('data'));
    }

    public function hapus($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User Berhasil dihapus');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('backend.user.edit', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $data = User::find($id);

        if ($request->password == "") {
            # password tidak diganti
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('admin.user')->with('success', 'User Berhasil diupdate');
        } else {
            # jika ada request password baru maka ganti password juga
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($data['password']),
            ]);
            return redirect()->route('admin.user')->with('success', 'User Berhasil diupdate dan Password berubah');
        }
    }
}
