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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/electricdrift/Homepage', function(){
  return view('electricdrift.Homepage');
});
Route::get('/electricdrift/Why_drive',function(){
  return view('electricdrift.Why_drive_electric');
});
Route::get('/electricdrift/tripplanner',function(){
  return view('electricdrift.tripplanner');
});
Route::get('/electricdrift/faq', function(){
  return view('electricdrift.faq_page');
});
Route::get('/electricdrift/fuel_comparison',function(){
  return view('electricdrift.fuel_comparison');
});
