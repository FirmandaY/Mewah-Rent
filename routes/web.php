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


/*
Route::get('/login', function () {
    return view('Admin.login');
})->name('login');
*/


Route::get('/', 'MewahController@index');

Route::get('/about', 'AboutController@about');

Route::get('/faq', 'FaqController@faq');

Route::get('/produk', 'ProdukController@produk');

Route::get('/tablet', 'TabletController@tablet');

Route::get('/produkPC', 'ProdukPCController@produkPC');

Route::get('/produkDetail', 'ProdukDetailController@produkdetail');

/* Untuk Daftar Produk Semua PC */
Route::get('/pcCatalog', 'PCCatalogController@index');



/*
Di bawah Ini Routes Buat Admin!
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/adminPC', 'ProdukPCController@index')->name('adminPC');

Route::get('/adminPC/create', 'ProdukPCController@create')->name('adminPC.create');

Route::post('/adminPC', 'ProdukPCController@store')->name('adminPC.store');

Route::post('/adminPC/delete/{id}', 'ProdukPCController@destroy')->name('adminPC.destroy');

Route::get('/adminPC/edit/{id}', 'ProdukPCController@edit')->name('adminPC.edit');

Route::post('/adminPC/{id}', 'ProdukPCController@update')->name('adminPC.update');

Route::get('/adminPC/search', 'ProdukPCController@search')->name('adminPC.search');