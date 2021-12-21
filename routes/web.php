<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StaffController;

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

// Route::get('/', function () {
//     return view('website.dashboard');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/member', [MemberController::class, 'show']);
    Route::get('/member/search', [MemberController::class, 'search']);

    Route::get('/member/tambah', [MemberController::class, 'index']);
    Route::post('/member/tambah', [MemberController::class, 'store']);

    Route::get('/member/edit/{member_id}', [MemberController::class, 'editShow']);
    Route::post('/member/edit', [MemberController::class, 'edit']);

    Route::post('/member/delete/{member_id}', [MemberController::class, 'delete']);

    Route::get('/member/profile/{member_id}', [MemberController::class, 'profile']);

    Route::get('/staff', [StaffController::class, 'show']);
    Route::get('/staff/search', [StaffController::class, 'search']);

    Route::get('/staff/tambah', [StaffController::class, 'index']);
    Route::post('/staff/tambah', [StaffController::class, 'store']);
    
    Route::get('/staff/edit/{id}', [StaffController::class, 'editShow']);
    Route::post('/staff/edit', [StaffController::class, 'edit']);

    Route::post('/staff/delete/{member_id}', [StaffController::class, 'delete']);

    Route::get('/staff/profile/{member_id}', [StaffController::class, 'profile']);

    Route::get('/transaksi', [TransaksiController::class, 'show']);
    Route::get('/transaksi/search', [TransaksiController::class, 'search']);

    Route::post('/transaksi/delete/{id}', [TransaksiController::class, 'delete']);

    Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'detail']);

    Route::get('/transaksi/tambah', [TransaksiController::class, 'index']);
    Route::post('/transaksi/tambah', [TransaksiController::class, 'store']);
});

