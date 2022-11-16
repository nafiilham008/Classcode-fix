<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::find(auth()->user()->id);

        return view('dashboard.setting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = User::find($id);
        return view('dashboard.setting.edit', compact('data'));
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
        $data = User::find($id);

        // Jika tidak ganti password
        if ($request->password == '') {
            if ($request->image == '') {

                $request->validate([
                    'name' => 'required',
                    'alamat' => 'required'
                ]);

                $data->update([
                    'username' => $request->name,
                    'alamat' => $request->alamat,
                ]);
                return redirect()->back()->with('success', 'Profile berhasil diupdate');
            } else {
                $request->validate([
                    'name' => 'required',
                    'alamat' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                if (!$data->image) {
                    $imageName = time() . '.' . $request->image->extension();
                } else {
                    $image = public_path('images_profil/' . $data->image);
                    unlink($image);

                    $imageName = time() . '.' . $request->image->extension();
                }

                $data->update([
                    'username' => $request->name,
                    'alamat' => $request->alamat,
                    'image' => $imageName
                ]);

                $request->image->move(public_path('images_profil/'), $imageName);


                return redirect()->back()->with('success', 'Profile berhasil diupdate');
            }
        } else {
            if ($request->image == '') {

                # jika ada maka
                $request->validate([
                    'name' => 'required',
                    'alamat' => 'required',
                    'password' => 'required|string|min:8|confirmed'
                ]);

                $data->update([
                    'username' => $request->name,
                    'alamat' => $request->alamat,
                    'password' => Hash::make($data['password']),
                ]);
                return redirect()->back()->with('success', 'Profile berhasil diupdate');
            } else {
                $request->validate([
                    'name' => 'required',
                    'alamat' => 'required',
                    'password' => 'required|string|min:8|confirmed',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

                ]);

                if (!$data->image) {
                    $imageName = time() . '.' . $request->image->extension();
                } else {
                    $image = public_path('images_profil/' . $data->image);
                    unlink($image);

                    $imageName = time() . '.' . $request->image->extension();
                }

                $data->update([
                    'username' => $request->name,
                    'alamat' => $request->alamat,
                    'password' => Hash::make($data['password']),
                    'image' => $imageName
                ]);

                $request->image->move(public_path('images_profil/'), $imageName);

                return redirect()->back()->with('success', 'Profile berhasil diupdate');
            }
        }
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
