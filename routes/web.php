<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintPDFController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'author' => 'Dzaky Syahrizal',
        'title' => 'Home'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/about', function () {
    return view('about', [
        'author' => 'Dzaky Syahrizal',
        'title' => 'About',
        'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. At incidunt totam quam architecto, enim laboriosam unde voluptate vel perferendis dolore quo, assumenda dolorum explicabo eos iste ut possimus quas magni aliquid provident. Molestias, voluptate quis! Dolorem consectetur atque dolor saepe repellendus! Velit, id. Nobis praesentium ut, itaque eligendi eius aut!'
    ]);
});

Route::resource('/lapor', LaporController::class)->except('index', 'show', 'edit', 'update', 'destroy');
Route::get('/lapor/create/makeSlug1', [LaporController::class, 'makeSlug1']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/reports', DashboardReportController::class)->except('destroy')->middleware('auth');
Route::get('/print/{report:slug}', [PrintPDFController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/users', AdminUserController::class)->except('show', 'edit', 'create', 'update', 'store', 'destroy')->middleware('is_admin');


Route::get('/dashboard/report/makeSlug', [DashboardReportController::class, 'makeSlug'])->middleware('auth');
