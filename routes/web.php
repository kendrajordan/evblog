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
Auth::routes();
Route::get('/', function () {return view('welcome');});
Route::get('/electricdrift/Why_drive',function(){return view('electricdrift.Why_drive_electric');})->middleware('auth');
Route::get('/electricdrift/tripplanner',function(){return view('electricdrift.tripplanner');})->middleware('auth');
Route::get('/electricdrift/faq', function(){return view('electricdrift.faq_page');})->middleware('auth');
Route::get('/electricdrift/fuel_comparison',function(){return view('electricdrift.fuel_comparison');})->middleware('auth');
Route::resource('/chargelogs','CarChargerController')->middleware('auth');
Route::resource('/chargers', 'ChargerController')->middleware('auth');
Route::resource('/cars','CarController')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
