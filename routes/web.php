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
Route::resource('contacts', 'ContactController')
	->middleware('auth');
Route::resource('addresses', 'AddressController')
	->middleware('auth');
Route::resource('electronic-addresses', 'ElectronicAddressController')
	->middleware('auth');
Route::resource('phones', 'PhoneController')
	->middleware('auth');
Route::resource('users', 'UserController', ['only' => [
	'index', 'edit', 'update'
]])
	->middleware('admin');