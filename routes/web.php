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

Route::view('/', 'main.dashboard')->middleware('auth');

Route::resource('outlet', 'OutletController')->except([
	'show'
]);
Route::resource('member', 'MemberController')->except([
	'show'
]);
Route::resource('transaksi', 'TransaksiController')->except([
	'show'
]);
Route::resource('paket', 'PaketController')->except([
	'show'
]);


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
