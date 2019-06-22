<?php

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

Route::get('/',function(){
    return view('auth.login');
});


//Inflasi Bulanan
Route::get('inflasi_bulanan','InflasiBulananControl@index');
Route::get('/inflasi_bulanan/add','InflasiBulananControl@add');
Route::post('/inflasi_bulanan/save','InflasiBulananControl@save');
Route::get('/inflasi_bulanan/edit/{id}','InflasiBulananControl@edit');
Route::get('/inflasi_bulanan/hapus/{id}','InflasiBulananControl@hapus');
Route::post('/inflasi_bulanan/update','InflasiBulananControl@update');

//inflasi_YoY
Route::get('inflasi_YoY','InflasiYoYControl@index');
Route::get('/inflasi_YoY/add','InflasiYoYControl@add');
Route::post('/inflasi_YoY/save','InflasiYoYControl@save');
Route::get('/inflasi_YoY/edit/{id}','InflasiYoYControl@edit');
Route::get('/inflasi_YoY/hapus/{id}','InflasiYoYControl@hapus');
Route::post('/inflasi_YoY/update','InflasiYoYControl@update');

//tahun_kalender
Route::get('tahun_kalender','TahunKalenderControl@index');
Route::get('/tahun_kalender/add','TahunKalenderControl@add');
Route::post('/tahun_kalender/save','TahunKalenderControl@save');
Route::get('/tahun_kalender/edit/{id}','TahunKalenderControl@edit');
Route::get('/tahun_kalender/hapus/{id}','TahunKalenderControl@hapus');
Route::post('/tahun_kalender/update','TahunKalenderControl@update');

//Inflasi Kategori

Route::get('inflasi_kategori','InflasiKategoriControl@index');
Route::get('/inflasi_kategori/add','InflasiKategoriControl@add');
Route::post('/inflasi_kategori/save','InflasiKategoriControl@save');
Route::get('/inflasi_kategori/edit/{id}','InflasiKategoriControl@edit');
Route::get('/inflasi_kategori/hapus/{id}','InflasiKategoriControl@hapus');
Route::post('/inflasi_kategori/update','InflasiKategoriControl@update');

//Item
Route::get('item','ItemControl@index');
Route::get('/item/add','ItemControl@add');
Route::post('/item/save','ItemControl@save');
Route::get('/item/edit/{id}','ItemControl@edit');
Route::get('/item/hapus/{id}','ItemControl@hapus');
Route::post('/item/update','ItemControl@update');

//Detail Item
Route::get('detail_item','DetailItemControl@index');
Route::get('/detail_item/add','DetailItemControl@add');
Route::post('/detail_item/save','DetailItemControl@save');
Route::get('/detail_item/edit/{id}','DetailItemControl@edit');
Route::get('/detail_item/hapus/{id}','DetailItemControl@hapus');
Route::post('/detail_item/update','DetailItemControl@update');

//Kategori
Route::get('kategori','KategoriControl@index');
Route::get('/kategori/add','KategoriControl@add');
Route::post('/kategori/save','KategoriControl@save');
Route::get('/kategori/edit/{id}','KategoriControl@edit');
Route::get('/kategori/hapus/{id}','KategoriControl@hapus');
Route::post('/kategori/update','KategoriControl@update');

Route::get('bulan','BulanControl@index');
Route::get('/bulan/add','BulanControl@add');
Route::post('/bulan/save','BulanControl@save');
Route::get('/bulan/edit/{id}','BulanControl@edit');
Route::get('/bulan/hapus/{id}','BulanControl@hapus');
Route::post('/bulan/update','BulanControl@update');


Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/dashboard','DashboardControl@grafik');




Auth::routes();

