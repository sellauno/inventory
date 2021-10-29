<?php

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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@toDashboard');
Route::get('/barang', 'BarangController@toBarang');
Route::get('/aksesoris', 'AksesorisController@toAksesoris');
Route::get('/pembelian', 'PembelianController@toPembelian');
Route::get('/hasilproduksi', 'HasilProduksiController@toHasilProduksi');

Route::get('/aksesoris/add', 'AksesorisController@add');
Route::post('/aksesoris/create', 'AksesorisController@create');

Route::get('/aksesoris/edit/{id}', 'AksesorisController@edit');
Route::post('/aksesoris/update/{id}','AksesorisController@update');
Route::get('/aksesoris/delete/{id}', 'AksesorisController@delete');