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

Route::get('/','PagesController@index')->name('index');
Route::get('fabricantes','PagesController@fabricantes')->name('fabricantes');
Route::get('fabricante/{name?}','PagesController@fabricante')->name('fabricante');
Route::get('pieza/{number}','PagesController@producto')->name('pieza');
Route::get('quienes-somos','PagesController@quienesSomos')->name('quienes-somos');
Route::get('contacto','PagesController@contacto')->name('contacto');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('enviar', 'PagesController@contactanosMail')->name('enviar');
