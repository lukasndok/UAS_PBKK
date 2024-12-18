<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'Sekolah'])->get('/user',
[UserController::class, 'index']);
Route::middleware(['auth', 'Sekolah'])->get('/user/create',
[UserController::class, 'create']);
Route::middleware(['auth', 'Sekolah'])->post('/user/store',
[UserController::class, 'store']);
Route::middleware(['auth', 'Sekolah'])->get('/user/edit/{id}',
[UserController::class, 'edit']);
Route::middleware(['auth', 'Sekolah'])->post('/user/update/{id}',
[UserController::class, 'update']);
Route::middleware(['auth', 'Sekolah'])->post('/user/destroy/{id}',
[UserController::class, 'destroy']);

Route::middleware(['auth', 'Sekolah'])->get('/pembina',
[PembinaController::class, 'index']);
Route::middleware(['auth', 'Sekolah'])->get('/pembina/create',
[PembinaController::class, 'create']);
Route::middleware(['auth', 'Sekolah'])->post('/pembina/store',
[PembinaController::class, 'store']);
Route::middleware(['auth', 'Sekolah'])->get('/pembina/edit/{id}',
[PembinaController::class, 'edit']);
Route::middleware(['auth', 'Sekolah'])->post('/pembina/update/{id}',
[PembinaController::class, 'update']);
Route::middleware(['auth', 'Sekolah'])->post('/pembina/destroy/{id}',
[PembinaController::class, 'destroy']);

Route::middleware(['auth', 'Sekolah'])->get('/ekstrakulikuler',
[EkstrakulikulerController::class, 'index']);
Route::middleware(['auth', 'Sekolah'])->get('/ekstrakulikuler/create',
[EkstrakulikulerController::class, 'create']);
Route::middleware(['auth', 'Sekolah'])->post('/ekstrakulikuler/store',
[EkstrakulikulerController::class, 'store']);
Route::middleware(['auth', 'Sekolah'])->post('/ekstrakulikuler/destroy/{id}',
[EkstrakulikulerController::class, 'destroy']);
Route::middleware(['auth', 'Sekolah'])->get('/ekstrakulikuler/edit/{id}', 
[EkstrakulikulerController::class, 'edit']); 
Route::middleware(['auth', 'Sekolah'])->post('/ekstrakulikuler/update/{id}', 
[EkstrakulikulerController::class, 'update']); 

Route::middleware(['auth'])->get('/pendaftaran/create',
[PendaftaranController::class, 'create']);
Route::middleware(['auth'])->post('/pendaftaran/store',
[PendaftaranController::class, 'store']);
Route::middleware(['auth'])->get('/dashboard', 
[DashboardController::class, 'index']);

Route::middleware(['auth', 'Sekolah'])->get('/pendaftaran',  
[PendaftaranController::class, 'index']); 
Route::middleware(['auth', 'Sekolah'])->post('/pendaftaran/terima/{id}',  
[PendaftaranController::class, 'terima']); 
Route::middleware(['auth', 'Sekolah'])->post('/pendaftaran/tolak/{id}',  
[PendaftaranController::class, 'tolak']); 