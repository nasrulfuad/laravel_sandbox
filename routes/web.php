<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('root');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questionnaires', 'QuestionnaireController')
    ->only(['create', 'store', 'show'])
    ->middleware('auth');


Route::resource('questionnaires.questions', 'QuestionController')
    ->only(['create', 'store', 'show', 'destroy'])
    ->middleware('auth');


Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show')->name('surveys.show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store')->name('surveys.store');
