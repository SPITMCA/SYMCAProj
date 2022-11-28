<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\regist;

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
    return view('welcome');
});

Route::get('/insurances_all', function () {
    
    return view('insurances_all');
});

Route::get('/star_ins', function () {
    return view('star_ins');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', function () {
    return view('login');
});

// Route::get('/ins_form', function () {
//     if(session()->has('cust_uname')){
//         Log::info(session_name());
//         return view('ins_form');
//     }
//     else{
//         abort(500);
//     }
    
// });



Route::get('/ins_form{cover_name}','App\Http\Controllers\regist@ins_form')->name('ins_form');

Route::get('/cust_logout','App\Http\Controllers\regist@cust_logout')->name('cust_logout');

Route::post('/registration','App\Http\Controllers\regist@regist_ins')->name('regist');

Route::post('/c_login','App\Http\Controllers\regist@cust_login')->name('c_login');

Route::post('/doc_check','App\Http\Controllers\regist@doc_check')->name('doc_check');

Route::get('/doc_del/{cvr_id_del}/{cust_iid_del}/{as_u}/{username_del}','App\Http\Controllers\regist@doc_del')->name('doc_del');

// Route::get('/doc_del_btn/{cvr_id_del}/{cust_iid_del}/{as_u}/{username_del}','App\Http\Controllers\regist@doc_del_btn')->name('doc_del_btn');

Route::get('/doc_del_btn/{cvr_id_del}/{cust_iid_del}','App\Http\Controllers\regist@doc_del_btn')->name('doc_del_btn');


Route::post('/pay_data','App\Http\Controllers\regist@pay_data')->name('pay_data');

Route::post('/data_upload','App\Http\Controllers\regist@data_upload')->name('data_upload');

Route::post('/pay_success_data','App\Http\Controllers\regist@pay_success_data')->name('pay_success_data');


Route::get('/hospital', function () {
    return view('hosp_home');
});

Route::get('/hosp_login', function () {
    return view('hosp_login');
});

Route::post('/hosp_login_data','App\Http\Controllers\hosp_regist@hosp_login_data')->name('hosp_login_data');

Route::get('/claim_form','App\Http\Controllers\hosp_regist@claim_form')->name('claim_form');

Route::get('/otp_gen/{otp_cid}/{otp_cvname}','App\Http\Controllers\hosp_regist@otp_gen')->name('otp_gen');

Route::post('/claim_submitted','App\Http\Controllers\hosp_regist@claim_submitted')->name('claim_submitted');

Route::get('/report1{year}/{dis_type}','App\Http\Controllers\hosp_regist@report1')->name('report1');
