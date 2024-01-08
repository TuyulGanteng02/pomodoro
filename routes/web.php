<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function (){
    return view('login');
});

Route::get('/register', function (){
    return view('register');
});

Route::get('/home', 'HomeController@home')->name('home');
Route::post('/store-task', 'HomeController@store');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@login');

Route::get('/register', 'RegisterController@register')->name('register');
Route::post('/register', 'RegisterController@register');
