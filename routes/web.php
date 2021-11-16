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
Route::get('/pcCatalog', 'PCCatalogController@index')->name('user.pc');



/*
Di bawah Ini Routes Buat Admin!
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Di bawah Ini Routes Buat Admin PC!
*/
Route::get('/adminPC', 'ProdukPCController@index')->name('adminPC');

Route::get('/adminPC/create', 'ProdukPCController@create')->name('adminPC.create');

Route::post('/adminPC', 'ProdukPCController@store')->name('adminPC.store');

Route::post('/adminPC/delete/{id}', 'ProdukPCController@destroy')->name('adminPC.destroy');

Route::get('/adminPC/edit/{id}', 'ProdukPCController@edit')->name('adminPC.edit');

Route::post('/adminPC/{id}', 'ProdukPCController@update')->name('adminPC.update');

Route::get('/adminPC/search', 'ProdukPCController@search')->name('adminPC.search');

/*
Di bawah Ini Routes Buat Admin Laptop!
*/
Route::get('/adminLaptop', 'ProdukLaptopController@index')->name('adminLaptop');

Route::get('/adminLaptop/create', 'ProdukLaptopController@create')->name('adminLaptop.create');

Route::post('/adminLaptop', 'ProdukLaptopController@store')->name('adminLaptop.store');

Route::post('/adminLaptop/delete/{id}', 'ProdukLaptopController@destroy')->name('adminLaptop.destroy');

Route::get('/adminLaptop/edit/{id}', 'ProdukLaptopController@edit')->name('adminLaptop.edit');

Route::post('/adminLaptop/{id}', 'ProdukLaptopController@update')->name('adminLaptop.update');

Route::get('/adminLaptop/search', 'ProdukLaptopController@search')->name('adminLaptop.search');