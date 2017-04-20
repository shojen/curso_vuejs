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

Route::get('ejemplo1',function(){
	return view('welcome');
});

Route::get('ejemplo2',function(){
	return view('ejemplo2');
});

Route::get('ejemplo3',function(){
	return view('ejemplo3');
});

Route::get('ejemplo4',function(){
	return view('ejemplo4');
});

Route::get('ejemplo5',function(){
	return view('ejemplo5');
});

Route::get('ejemplo6',function(){
	return view('ejemplo6');
});

Route::get('ejemplo7',function(){
	return view('ejemplo7');
});

Route::get('ejemplo8',function(){
	return view('ejemplo8');
});