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

Route::resource('outlet', 'OutletController')->except(['show']);

Route::resource('member', 'MemberController')->except(['show']);
Route::get('member/sampah','MemberController@trash')->name('member.trash');
Route::get('member/restore/{member}','MemberController@restore')->name('member.restore');
Route::delete('member/permanent/delete/{member}','MemberController@forceDelete')->name('member.forceDelete');
Route::delete('member/permanent/delete','MemberController@forceDeleteAll')->name('member.forceDelete.all');

Route::resource('transaksi', 'TransaksiController')->except(['show']);
Route::resource('paket', 'PaketController')->except(['show']);


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
