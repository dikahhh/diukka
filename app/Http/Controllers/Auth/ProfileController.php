<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('auth.edit', compact('user'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input sesuai dengan RegisterController
        $validator = Validator::make($request->all(), [
            'ktp'      => ['required', 'integer', 'unique:users,ktp,' . $user->id],
            'name'     => ['required', 'string', 'max:255'],
            'alamat'   => ['required', 'string', 'max:255'],
            'hp'       => ['required', 'string', 'max:15'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $validator->validate();

        // Update data user (perhatikan mapping: input "name" disimpan ke field "nama")
        $user->ktp    = $request->ktp;
        $user->nama   = $request->name;
        $user->alamat = $request->alamat;
        $user->hp     = $request->hp;
        $user->email  = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('auth.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
