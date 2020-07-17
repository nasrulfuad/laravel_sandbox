<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questionnaires', 'QuestionnaireController')
    ->only(['create', 'store', 'show'])
    ->middleware('auth');
