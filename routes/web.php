<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TblBarangController;
use App\Http\Controllers\TblDbeliController;
use App\Http\Controllers\TblHbeliController;
use App\Http\Controllers\TblHutangController;
use App\Http\Controllers\TblStockController;
use App\Http\Controllers\TblSuplierController;
use App\Models\Tbl_Dbeli;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login.index');
});




Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// //nyimpan data
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/suplier', TblSuplierController::class)->middleware('auth');

// Route::resource('/register', TblSuplierController::class)->middleware('auth');

// Route::resource('/dashboard/stock', TblStockController::class)->middleware('auth');

// Route::resource('/dashboard/hbeli', TblHbeliController::class)->middleware('auth');

// Route::resource('/dashboard/dbeli', TblDbeliController::class)->middleware('auth');

// Route::resource('/dashboard/hutang', TblHutangController::class)->middleware('auth');

Route::resource('/dashboard/barang', TblBarangController::class)->middleware('auth');

Route::resource('/dashboard/pembelian', PembelianController::class)->middleware('auth');
