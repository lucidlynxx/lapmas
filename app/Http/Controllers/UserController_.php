<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index', [
            'author' => 'Dzaky Syahrizal',
            'title' => "Users",
            'users' => User::latest()->get()
        ]);
    }
}
