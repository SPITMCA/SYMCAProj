<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registration','App\Http\Controllers\regist@regist_ins')->name('regist');


Route::post('/cust_login','App\Http\Controllers\regist@cust_login')->name('cust_login');


Route::post('/insurance_ins','App\Http\Controllers\admincont@insurance_ins')->name('insurance_ins');

Route::post('/admin_cv_ins','App\Http\Controllers\admincont@admin_cv_ins')->name('admin_cv_ins');

Route::get('/allot_scheme','App\Http\Controllers\regist@allot_scheme')->name('allot_scheme');



Route::get('/check','regist@check')->name('check');