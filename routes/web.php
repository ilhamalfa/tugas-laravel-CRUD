<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::resource('siswa', SiswaController::class)->middleware('admin');

Route::get('user', function () {
    return view('user.index');
});

Route::resource('upload', UploadController::class);

// Mengecek API get
Route::get('wilayah', [SiswaController::class, 'wilayah']);

Route::get('postData', [SiswaController::class, 'postData']);

// Mengelompokkan Middleware
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('siswa', SiswaController::class);
// });

// Route::get('/table', function () {
//     $data = [
//         [
//             'nama' => 'aaa',
//             'alamat' => 'aaa'
//         ],
//         [
//             'nama' => 'bbb',
//             'alamat' => 'bbb'
//         ],
//         [
//             'nama' => 'ccc',
//             'alamat' => 'ccc'
//         ]
//     ];

//     return view('table', compact('data'));
// });

// get('nama_URL', [namaController::class, 'nama_function']);
// Route::get('/dashboard', [SiswaController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
