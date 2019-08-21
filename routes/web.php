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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search' , 'HomeController@search')->name('search');
Route::get('/createAdvertising' , 'AdvertisingController@create')->name('createad');
Route::get('/advertising/{id}' , 'AdvertisingController@show')->name('advertising');
Route::post('/createAdvertising' , 'AdvertisingController@store')->name('createAdvertising');
Route::get('/verification/{id}' , 'VerificationController@show')->name('verification');
Route::get('/sendcode' , 'VerificationController@send')->name('sendcode');
Route::post('/checkcode' , 'VerificationController@check')->name('checkcode');
Route::post('/signin' , 'Auth\LoginController@signin')->name('signin');

