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

/*
Route::get('/login', function () {
    return view('Admin.login');
})->name('login');
*/

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/homeadmin', 'HomeAdminController@index');

Route::get('/', 'MewahController@index');

Route::get('/about', 'AboutController@about');

Route::get('/faq', 'FaqController@faq');

Route::get('/produk', 'ProdukController@produk');

Route::get('/tablet', 'TabletController@tablet');

Route::get('/produkPC', 'ProdukPCController@produkPC');

Route::get('/produkDetail', 'ProdukDetailController@produkdetail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::get('/adminPC', 'PCController@index')->name('adminPC');

Route::get('/adminPC/create', 'PCController@create')->name('adminPC.create');

Route::post('/adminPC', 'PCController@store')->name('adminPC.store');

Route::post('/adminPC/delete/{id}', 'PCController@destroy')->name('adminPC.destroy');

Route::get('/adminPC/edit/{id}', 'PCController@edit')->name('adminPC.edit');

Route::post('/adminPC/{id}', 'PCController@update')->name('adminPC.update');

Route::get('/adminPC/search', 'PCController@search')->name('adminPC.search');