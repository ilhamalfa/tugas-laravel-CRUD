<?php

use App\Http\Controllers\SiswaController;
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
    return view('dashboard');
});

Route::resource('siswa', SiswaController::class);

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