<?php

use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\daftarController;
use App\Http\Controllers\jualPostController;
use App\Models\kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        "title" => "",
        'active' => ""

    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active' => 'about',
        "nama" => "Rinaldi Oktarinanda",
        "tempat" => "DKI Jakarta",
        "email" => "rinaldy143@gmail.com",
        "image" => "omori.jpg"

    ]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/post', [PostController::class, 'index']);

// halaman single route
Route::get('post/{posts:slug}',[PostController::class, 'show']);

Route::get('/kategoris', function() {
    return view('kategoris', [
        'title' => 'Kategori Barang',
        'active' => 'kategoris',
        'kategoris' => kategori::all(),

    ]);
});


route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
route::post('/login', [LoginController::class, 'auth']);
route::post('/logout', [LoginController::class, 'logout']);
route::get('/daftar', [daftarController::class, 'index'])->middleware('guest');
route::post('/daftar', [daftarController::class, 'store']);


route::get('/jual', function() {
    return view('jual.index');
})->middleware('auth');
route::get('/beli', function() {
    return view('beli');
})->middleware('auth');



route::get('/jual/posts/checkSlug', [jualPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/jual/posts', jualPostController::class)->middleware('auth');

Route::resource('/jual/kategoris', AdminKategoriController::class)->except('show')->middleware('is_admin');




