<?php

use Illuminate\Support\Facades\Route;

Route::get('/','PagesController@index')->name('index');
Route::get('fabricantes','PagesController@fabricantes')->name('fabricantes');
Route::get('fabricantes/{name}','PagesController@fabricante')->name('fabricante');
Route::get('{manufacturer}/{number}','PagesController@producto')->name('pieza');
Route::get('quienes-somos','PagesController@quienesSomos')->name('quienes-somos');
Route::get('contacto','PagesController@contacto')->name('contacto');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('enviar', 'PagesController@contactanosMail')->name('enviar');
Route::post('contacto-producto', 'MessageController@contactProduct')->name('contacto-producto');
