<?php

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
//     return view('welcome');
// });

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'MenuController@login')->name('login');
    Route::post('/ceklogin', 'MenuController@ceklogin');
    Route::get('/search-movie', 'MenuController@searchMovie');
    Route::get('/actsearchmovie', 'MenuController@actsearchmovie');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'MenuController@home');
    Route::get('/movie', 'MenuController@movie');
    Route::get('/movie/form-movie', 'MenuController@addmovie');
    Route::get('/kategori', 'MenuController@kategori');
    Route::get('/genre', 'MenuController@genre');
    Route::post('/savemovie', 'MenuController@savemovie');
    Route::get('/movie/form-ubah/{id}', 'MenuController@editmovie');
    Route::put('/update/{id}', 'MenuController@updatemovie');
    Route::get('/delete/{id}', 'MenuController@deletemovie');
    //pakai get ga pake delete karena harus manggil form dulu kalau delete, harusnya langsung hapus saja.
    Route::get('/ubahpass', 'MenuController@ubahpass');
    Route::post('/updatepass', 'MenuController@updatepass');
    Route::get('/logout', 'MenuController@logout');
    
});

