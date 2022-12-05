<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\PoskoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PengungsiController;

use App\Http\Controllers\LoginController;

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


Route::get('', function () {
    return view('login.login', [
        'title' => 'Silahkan login terlebih dahulu'
    ]);
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::post('login', 'DashboardController@login');

Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('bencana', BencanaController::class);
Route::resource('posko', PoskoController::class);
Route::resource('member', MemberController::class);
Route::resource('pengungsi', PengungsiController::class);

Route::post('member/create', [MemberController::class, 'createMember'])->name('member.create');
