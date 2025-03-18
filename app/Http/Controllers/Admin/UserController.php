<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function AdminRegister()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // Menampilkan form untuk menambah pengguna
    public function create()
    {
        return view('admin.user.create');
    }

    // Proses penambahan pengguna
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = User::create([
            'ktp'    => $request->ktp,
            'nama'   => $request->name,
            'alamat' => $request->alamat,
            'hp'     => $request->hp,
            'email'  => $request->email,
            'password' => Hash::make($request->password),
            'role'   => $request->role,
        ]);

        // Jika memakai spatie/laravel-permission:
        $user->assignRole($request->role);
        // Berikan permission "active" agar akun aktif secara default
        $user->givePermissionTo('active');

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    // Form edit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Proses update pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->updateValidator($request->all(), $id)->validate();

        $user->ktp    = $request->ktp;
        $user->nama   = $request->name;
        $user->alamat = $request->alamat;
        $user->hp     = $request->hp;
        $user->email  = $request->email;
        $user->role   = $request->role;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Sinkronisasi role (menggunakan spatie)
        $user->syncRoles([$request->role]);

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    // Hapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus!');
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'role' => 'required|in:admin,user,nonaktif',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role pengguna berhasil diperbarui.');
    }

    // Validator untuk create
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ktp' => ['required', 'integer', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'hp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,superadmin'],
        ]);
    }

    // Validator untuk update (abaikan unik untuk user sendiri)
    protected function updateValidator(array $data, $id)
    {
        return Validator::make($data, [
            'ktp' => ['required', 'integer', 'unique:users,ktp,' . $id],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'hp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,superadmin'],
        ]);
    }
}
