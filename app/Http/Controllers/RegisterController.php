<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;;

class RegisterController extends Controller
{
    public function index()
    {
        return view('form.registration', [
            'author' => 'Dzaky Syahrizal',
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255|confirmed',
            'nik' => 'required|unique:users|numeric|integer|digits:16',
            'alamat' => 'required|max:255',
            'rtrw' => 'required|max:255',
            'password_confirmation' => 'required|min:6|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        alert()->success('Registrasi Sukses!', 'Akun anda telah dibuat.');

        return back();
    }
}
