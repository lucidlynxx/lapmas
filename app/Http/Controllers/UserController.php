<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(User $user)
    {
        $messages = Message::get();

        if (auth()->user()->name !== $user->name) {
            return view('dashboard.404', [
                'author' => 'Dzaky Syahrizal',
                "title" => "Not Found",
                'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
            ]);
        }

        if (Gate::allows('admin')) {
            return view('dashboard.users.profile', [
                'author' => 'Dzaky Syahrizal',
                'title' => "Users",
                'user' => $user,
                'jmlPemberitahuan' => $messages->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.users.profile', [
            'author' => 'Dzaky Syahrizal',
            'title' => "Users",
            'user' => $user,
            'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'passwordLama' => 'required|min:6|max:255',
            'password' => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required|min:6|max:255',
        ]);

        if (!Hash::check($validatedData['passwordLama'], $user->password)) {
            alert()->error('Ganti Password Gagal!', 'Silakan coba lagi.');
            return back();
        }

        if (strcmp($validatedData['passwordLama'], $validatedData['password']) == 0) {
            alert()->error('Silakan coba lagi', 'Password baru tidak boleh sama dengan password lama.');
            return back();
        }

        $user->save([
            $user->name = $validatedData['name'],
            $user->email = $validatedData['email'],
            $user->password = Hash::make($validatedData['password'])
        ]);

        $user->refresh();

        alert()->success('Ubah Profile Sukses!', 'Profile telah berubah.');

        return redirect('/dashboard');
    }
}
