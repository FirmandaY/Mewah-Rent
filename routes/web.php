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
    return view('User.index');
});

Route::group(['middleware' => ['auth']], function(){

    Route::get('/beranda','BerandaController@index');
});

Route::get('/login', function () {
    return view('Admin.login');
})->name('login');

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/homeadmin', 'HomeAdminController@index');

Route::get('/about', 'AboutController@about');

Route::get('/faq', 'FaqController@faq');

Route::get('/produk', 'ProdukController@produk');

Route::get('/produkDetail', 'ProdukDetailController@produkdetail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
