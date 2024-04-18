<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['middleware' => ['isNotLogin']], function () use ($router) {
    Route::get('/login', 'AuthController@index');
    Route::post('/login-process', 'AuthController@login');
});



Route::group(['middleware' => ['isLogin']], function () use ($router) {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::get('/logout', 'AuthController@logout');
    Route::get('/master-admin', 'UserController@index');
    Route::get('/master-admin/create', 'UserController@create');
    Route::post('/master-admin/create', 'UserController@store');
    Route::get('/master-admin/edit/{id}', 'UserController@edit');
    Route::post('/master-admin/edit-process', 'UserController@update');
    Route::get('/master-admin/delete/{id}', 'UserController@destroy');
    Route::get('/ticket-report', 'TicketController@index');
    Route::get('/ticket-create', 'TicketController@create');
    Route::post('/ticket-create', 'TicketController@store');
});
