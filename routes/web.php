<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\episodeController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\movieController;
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

Route::get('/',[App\Http\Controllers\indexController::class, 'home'])->name('homepage');
Route::get('/the-loai',[App\Http\Controllers\indexController::class, 'catological'])->name('danhmuc');
Route::get('/the-loai2/{slug}',[App\Http\Controllers\indexController::class, 'catological2'])->name('danhmuc2');
Route::get('/chi-tiet/{slug}',[App\Http\Controllers\indexController::class, 'detail'])->name('detail');
Route::get('/xem-phim/{slug}/{tap}',[App\Http\Controllers\indexController::class, 'watch'])->name('watch');
Route::get('/tap-phim',[App\Http\Controllers\indexController::class, 'episode'])->name('tap-phim');
Route::get('/tim-kiem',[App\Http\Controllers\indexController::class, 'timkiem'])->name('tim_kiem');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/select-movie',[App\Http\Controllers\episodeController::class,'select_movie'])->name('selectmovie');
//route admin
Route::resource('category',App\Http\Controllers\categoryController::class);
Route::resource('episode',App\Http\Controllers\episodeController::class);
Route::resource('genre',App\Http\Controllers\genreController::class);
Route::resource('movie',App\Http\Controllers\movieController::class);
Route::get('/update-topviews',[App\Http\Controllers\movieController::class,'update_topviews'])->name('topview');
Route::get('/update-season',[App\Http\Controllers\movieController::class,'update_season'])->name('season');
