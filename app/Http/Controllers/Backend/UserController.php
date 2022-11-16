<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as ModelsRole;

class UserController extends Controller
{

    public function modelHasRolesAll()
    {
        return DB::table('users')
            ->select('model_has_roles.*', 'roles.*', 'users.*')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            // ->where(['users.id' => $id])
            ->get();
        //     return User::findOrFail($id);
        // return ModelsRole::with('userShow')->where('id', $id)->first();
    }

    public function allRoles()
    {
        return ModelsRole::all();
    }


    public function index()
    {
        // $data = User::all();
        $data = $this->modelHasRolesAll();

        // dd($data);
        return view('backend.user.index', compact('data'));
    }

    public function settingMentor()
    {
        $data = User::find(auth()->user()->id);

        return view('backend.user.setting.index', compact('data'));
    }

    public function editMentor($id)
    {
        $data = User::find($id);
        return view('backend.user.edit', compact('data'));
    }

    public function updateMentor(Request $request, $id)
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

    public function checkId($id)
    {
        return User::where('id', $id)->first();
    }

    public function create()
    {
        $dataRole = $this->allRoles();
        return view('backend.user.create', compact('dataRole'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        // dd($cek);

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole($request->role);


        return redirect()->route('admin.user')->with('success', 'User Berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User Berhasil dihapus');
    }

    public function edit($id)
    {
        $data = $this->checkId($id);
        $dataRole = $this->allRoles();
        // $cek = $this->modelHasRoles($id);
        // dd($data);
        if ($data->id == 1) {
            # code...
            return view('backend.user.edit', compact('data'));
        } else {
            # code...
            return view('backend.user.editRole', compact('data', 'dataRole'));
            // return redirect()->route('admin.user')->with('error', 'Edit dibatalkan');
        }
    }

    public function update(Request $request, $id)
    {

        $data = $this->checkId($id);

        if ($request->password == "") {
            # password tidak diganti
            $request->validate([
                'email' => 'required',
                'name' => 'required',
            ]);


            $data->update([
                'username' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('admin.user')->with('success', 'User Berhasil diupdate');
        } else {
            // dd($data);
            # jika ada request password baru maka ganti password juga
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            $data->update([
                'username' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($data['password']),
            ]);

            return redirect()->route('admin.user')->with('success', 'User Berhasil diupdate dan Password berubah');
        }
        // try {
        // } catch (\Throwable $th) {
        //     return $th->getMessage();
        // }
    }

    public function updateRole(Request $request, $id)
    {

        $data = $this->checkId($id);

        $request->validate([
            'role' => 'required',
        ]);

        // $data->update([
        //     'role' => $request->role,
        //     'email' => $request->email,
        // ]);
        if ($data->hasRole($request->role)) {
            return redirect()->route('admin.user')->with('success', 'User role berhasil diubah');
        }

        $data->syncRoles($request->role);

        return redirect()->route('admin.user')->with('success', 'User Berhasil diubah');
    }
}
