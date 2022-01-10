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



Route::post('/result', 'ResultController@index') -> name('result')->middleware('auth');

Route::get('/result/store', 'ResultController@store') -> name('show')->middleware('auth');
Route::post('/result/store', 'ResultController@store') -> name('store')->middleware('auth');


Route::post('/evalu','EvaluationsController@index') ->name('evalu');

Route::get('/questions/back','BackController@back')->middleware('auth');

Route::post('/questions','QuestionsController@repeat');
Route::get('/questions','QuestionsController@start')->middleware('auth');


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



// Route::get('/home', 'HomeController@index')->name('home');
