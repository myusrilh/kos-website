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

Route::get('/', 'BerandaController@show');
Route::get('cari', 'BerandaController@cari');

Route::group([
    'prefix' => 'auth',
    'middleware' => ['revalidate'],
    'as' => 'auth.',
], function () {
    Route::get('pemilik/login', 'UserController@login_pemilik');

    Route::get('pencari/login', 'UserController@login_pencari');

    Route::post('pemilik/proses/login', 'UserController@proses_login_pemilik');
    Route::post('pencari/proses/login', 'UserController@proses_login_pencari');

    Route::get('pemilik/logout', 'UserController@logout_pemilik');
    Route::get('pencari/logout', 'UserController@logout_pencari');

    Route::get('admin', 'AdminController@login');
    Route::post('admin/proses/login','AdminController@proses');
    Route::get('admin/logout','AdminController@logout');
});

Route::group([
    'prefix' => 'pemilik',
    'middleware' => ['revalidate'],
    'as' => 'pemilik.',
], function () {
    Route::get('home', 'PemilikController@home');
    Route::get('profile', 'PemilikController@profile');
    Route::post('edit/profile', 'PemilikController@edit_profile');
    Route::get('kos/{id}', 'PemilikController@kos');
    Route::get('kontrakan/{id}', 'PemilikController@kontrakan');
    Route::get('penginapan/{id}', 'PemilikController@penginapan');
    // Register and login
    Route::get('register', 'UserController@register_pemilik');
    Route::post('insert', 'UserController@insert_pemilik');
});

Route::group([
    'prefix' => 'pencari',
    'middleware' => ['revalidate'],
    'as' => 'pencari.',
], function () {
    Route::get('register', 'UserController@register_pencari');
    Route::post('insert', 'UserController@insert_pencari');
    Route::get('profile', 'UserController@profile');
    Route::post('edit/profile', 'UserController@edit_profile');
    
    Route::get('list/transaksi', 'TransaksiController@show');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['revalidate'],
    'as' => 'admin.',
], function () {
    Route::get('home', 'AdminController@home');
    Route::get('profile', 'AdminController@profile');
    Route::post('edit/profile', 'AdminController@edit_profile');
    Route::get('user', 'AdminController@list_user');
    Route::get('delete/{id}', 'AdminController@delete');
    Route::get('edit/{id}', 'AdminController@edit');
    Route::post('update/{id}', 'AdminController@update');
    Route::get('pesanan', 'AdminController@list_pesanan');
    Route::get('verifikasi/{id}/{verifikasi}', 'AdminController@verifikasi_pesanan');
});

Route::group([
    'prefix' => 'kos',
    // 'namespace' => 'Kos',
    'middleware' => ['revalidate'],
    'as' => 'kos.',
], function () {
    Route::get('detail/{id}', 'KosController@detail');
    Route::get('show', 'KosController@show');
    Route::get('tambah', 'KosController@tambah');
    Route::post('store', 'KosController@store');
    Route::get('cari', 'KosController@cari');
    Route::post('filter/tipe', 'KosController@filter_tipe');
    Route::post('filter/fasilitas', 'KosController@filter_fasilitas');
    Route::post('pesan','KosController@pesan');
    // Route::get('batal/{id}','KosController@batal');
    
});

Route::group([
    'prefix' => 'kontrakan',
    // 'namespace' => 'Kontrakan',
    'middleware' => ['revalidate'],
    'as' => 'kontrakan.',
], function () {
    Route::get('detail/{id}', 'KontrakanController@detail');
    Route::get('show', 'KontrakanController@show');
    Route::get('tambah', 'KontrakanController@tambah');
    Route::post('store', 'KontrakanController@store');
    Route::get('cari', 'KontrakanController@cari');
    Route::post('filter/tipe', 'KontrakanController@filter_tipe');
    Route::post('pesan','KontrakanController@pesan');
    // Route::get('batal/{id}','KontrakanController@batal');
});

Route::group([
    'prefix' => 'penginapan',
    // 'namespace' => 'Penginapan',
    'middleware' => ['revalidate'],
    'as' => 'penginapan.',
], function () {
    Route::get('detail/{id}', 'PenginapanController@detail');
    Route::get('show', 'PenginapanController@show');
    Route::get('tambah', 'PenginapanController@tambah');
    Route::post('store', 'PenginapanController@store');
    Route::get('cari', 'PenginapanController@cari');
    Route::post('filter/tipe', 'PenginapanController@filter_tipe');
    Route::post('pesan','PenginapanController@pesan');
    // Route::get('batal/{id}','PenginapanController@batal');
});

