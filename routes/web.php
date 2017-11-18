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
Route::view('/home', 'home')
	->name('home')
	->middleware('auth');
Route::redirect('/', '/home');
Route::resource('contacts', 'ContactController');
Route::resource('addresses', 'AddressController');
Route::resource('electronic-addresses', 'ElectronicAddressController');
Route::resource('phones', 'PhoneController');
Route::resource('users', 'UserController', ['only' => [
	'index', 'edit', 'update'
]]);