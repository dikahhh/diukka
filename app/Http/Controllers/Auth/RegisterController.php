<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    // Menampilkan form register biasa
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    // Proses register biasa
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->route('frontend.index')->with('success', 'Registration successful!');
    }

    // Validator untuk register biasa
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ktp' => ['required', 'integer', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'hp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Membuat user biasa
    protected function create(array $data)
    {
        return User::create([
            'ktp' => $data['ktp'],
            'nama' => $data['name'],
            'alamat' => $data['alamat'],
            'hp' => $data['hp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user', // Default role untuk user biasa
        ]);
    }
}
