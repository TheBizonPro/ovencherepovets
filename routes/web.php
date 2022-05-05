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

    Route::get('/', function () {
        return view('home', ['cards' => \App\Models\Oven::all()]);
    })->name('home');
    Route::get('category/{slug}', 'App\Http\Controllers\HomeController@cardOven')->name('category');
    Route::get('oven/{slug}','App\Http\Controllers\HomeController@getOven')->name('oveninfo');
    Route::post('call' ,'App\Http\Controllers\HomeController@call')->name('call');

require __DIR__.'/auth.php';
    Route::get('/dump',function (){
        return view('welcome');
    });
