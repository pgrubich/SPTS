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


Route::view('','searching');

Route::view('/editProfile','editProfile')->middleware('auth');

Route::get('/profiles/addOpinion', ['uses' =>'OpinionController@create']);

Route::view('/profiles/{id}', 'profile');

Route::view('/{dycyplina}/{miasto}', 'searchDisciplineAndLocationResult');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('editPrimaryInfo', ['uses' =>'editProfileController@updatePrimaryInfo']);

Route::get('editEmailInfo', ['uses' =>'editProfileController@updateEmailInfo']);

Route::get('editSpecificInfo', ['uses' =>'editProfileController@updateSpecificInfo']);

Route::get('updateProfilePhoto', ['uses' => 'TrainersController@updateProfilePhoto']);


