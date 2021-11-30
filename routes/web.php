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


Route::get('/', 'UserHomeController@index');

Route::get('/about', 'AboutController@about');

Route::get('/faq', 'FaqController@faq');

Route::post('/produk/ProdukLain/{title}', 'ProdukLainController@index')->name('user.produklain');

Route::get('/tablet', 'TabletController@tablet');

Route::get('/produkPC', 'ProdukPCController@produkPC');

Route::get('/produk/produkDetail/{title}', 'ProdukDetailController@produkdetail')->name('user.produkdetail');

/* Untuk Daftar Produk Semua PC */
Route::get('/pcCatalog', 'PCCatalogController@index')->name('user.pc');



/*
Di bawah Ini Routes Buat Admin!
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
Di bawah Ini Routes Buat Admin Kategori!
*/

Route::get('/adminKategori', 'AdminKategoriController@index')->name('adminKategori');

Route::get('/adminKategori/create', 'AdminKategoriController@create')->name('adminKategori.create');

Route::post('/adminKategori', 'AdminKategoriController@store')->name('adminKategori.store');

Route::post('/adminKategori/delete/{id}', 'AdminKategoriController@destroy')->name('adminKategori.destroy');

Route::get('/adminKategori/edit/{id}', 'AdminKategoriController@edit')->name('adminKategori.edit');

Route::post('/adminKategori/{id}', 'AdminKategoriController@update')->name('adminKategori.update');

Route::get('/adminKategori/search', 'AdminKategoriController@search')->name('adminKategori.search');

Route::get('/adminKategori/ProdukLain/{title}', 'AdminKategoriController@prodkategori')->name('kategori.produklain');


/*
Di bawah Ini Routes Buat Admin About!
*/

Route::get('/adminAbout', 'AdminAboutController@index')->name('adminAbout');

Route::get('/adminAbout/create', 'AdminAboutController@create')->name('adminAbout.create');

Route::post('/adminAbout', 'AdminAboutController@store')->name('adminAbout.store');

Route::post('/adminAbout/delete/{id}', 'AdminAboutController@destroy')->name('adminAbout.destroy');

Route::get('/adminAbout/edit/{id}', 'AdminAboutController@edit')->name('adminAbout.edit');

Route::post('/adminAbout/{id}', 'AdminAboutController@update')->name('adminAbout.update');

Route::get('/adminAbout/search', 'AdminAboutController@search')->name('adminAbout.search');

/*
Di bawah Ini Routes Buat Admin FAQ!
*/

Route::get('/adminFAQ', 'AdminFAQController@index')->name('adminFAQ');

Route::get('/adminFAQ/create', 'AdminFAQController@create')->name('adminFAQ.create');

Route::post('/adminFAQ', 'AdminFAQController@store')->name('adminFAQ.store');

Route::post('/adminFAQ/delete/{id}', 'AdminFAQController@destroy')->name('adminFAQ.destroy');

Route::post('/adminFAQ/edit/{id}', 'AdminFAQController@edit')->name('adminFAQ.edit');

Route::post('/adminFAQ/{id}', 'AdminFAQController@update')->name('adminFAQ.update');

Route::get('/adminFAQ/search', 'AdminFAQController@search')->name('adminFAQ.search');

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

/*
Di bawah Ini Routes Buat Admin Produk Lain!
*/
Route::get('/adminProdukLain', 'AdminProdukLainController@index')->name('adminProdukLain');

Route::get('/adminProdukLain/create', 'AdminProdukLainController@create')->name('adminProdukLain.create');

Route::post('/adminProdukLain', 'AdminProdukLainController@store')->name('adminProdukLain.store');

Route::post('/adminProdukLain/delete/{id}', 'AdminProdukLainController@destroy')->name('adminProdukLain.destroy');

Route::get('/adminProdukLain/edit/{id}', 'AdminProdukLainController@edit')->name('adminProdukLain.edit');

Route::post('/adminProdukLain/{id}', 'AdminProdukLainController@update')->name('adminProdukLain.update');

Route::get('/adminProdukLain/search', 'AdminProdukLainController@search')->name('adminProdukLain.search');

Route::get('/adminProdukLain/GaleriPL/{title}', 'AdminProdukLainController@prodgaleri')->name('galeri.produklain');

/*
Di bawah Ini Routes Buat Admin Galeri Produk Lain!
*/
Route::get('/adminGaleriPL', 'AdminGaleriPLController@index')->name('adminGaleriPL');

Route::get('/adminGaleriPL/create', 'AdminGaleriPLController@create')->name('adminGaleriPL.create');

Route::post('/adminGaleriPL', 'AdminGaleriPLController@store')->name('adminGaleriPL.store');

Route::post('/adminGaleriPL/delete/{id}', 'AdminGaleriPLController@destroy')->name('adminGaleriPL.destroy');

Route::get('/adminGaleriPL/edit/{id}', 'AdminGaleriPLController@edit')->name('adminGaleriPL.edit');

Route::post('/adminGaleriPL/{id}', 'AdminGaleriPLController@update')->name('adminGaleriPL.update');

Route::get('/adminGaleriPL/search', 'AdminGaleriPLController@search')->name('adminGaleriPL.search');