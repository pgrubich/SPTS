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

//Route::get('/profile', 'TrainersController@profile');

Route::view('/searching','searching');

Route::view('/editProfile','editProfile');

Route::view('/profiles/{id}', 'profile');

Route::view('/{dycyplina}/{miasto}', 'searchDisciplineAndLocationResult');

Auth::routes();


