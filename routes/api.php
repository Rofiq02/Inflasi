<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//MOBILE SERVER
Route::post('/mobile/save_member','MobileControl@save_member');
Route::get('/mobile/get_inflasi','MobileControl@get_inflasi');
Route::get('/mobile/get_bulanan/{tahuna?}','MobileControl@get_bulanan');
Route::get('/mobile/get_kalender/{tahun?}','MobileControl@get_kalender');
Route::get('/mobile/limit_kalender','MobileControl@limit_kalender');
Route::get('/mobile/get_inflasi_kategori','MobileControl@get_inflasi_kategori');
Route::get('/mobile/get_inflasi_item','MobileControl@get_inflasi_item');
Route::get('/mobile/get_inflasi_komoditas/{kd_bulan?}/{tahun?}','MobileControl@get_inflasi_komoditas');
Route::get('/mobile/get_inflasi_yoy/{tahun?}','MobileControl@get_inflasi_yoy');
Route::get('/mobile/get_inflasi_terkini','MobileControl@get_inflasi_terkini');
Route::get('/mobile/get_kategori/{tahun?}','MobileControl@get_kategori');
Route::get('/mobile/get_inflasi_kemarin','MobileControl@get_inflasi_kemarin');
Route::get('/mobile/get_kalender_terkini','MobileControl@get_kalender_terkini');
Route::get('/mobile/get_kategori_sekarang','MobileControl@get_kategori_sekarang');
Route::get('/mobile/get_yoy_limit','MobileControl@get_yoy_limit');
Route::post('mobile/register','MobileControl@register');
Route::post('mobile/login','MobileControl@login');



