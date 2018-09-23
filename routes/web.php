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

Route::get('addCity', ['uses' =>'editProfileController@addCity']);

Route::get('editSpecificInfo', ['uses' =>'editProfileController@updateSpecificInfo']);

Route::get('updateDisciplines', ['uses' =>'editProfileController@updateDisciplines']);

Route::get('addCourse', ['uses' =>'editProfileController@addCourse']);

Route::get('editCourse', ['uses' =>'editProfileController@editCourse']);

Route::get('addUni', ['uses' =>'editProfileController@addUni']);

Route::get('editUni', ['uses' =>'editProfileController@editUni']);

Route::get('addTrainerOffer', ['uses' =>'editProfileController@addTrainerOffer']);

Route::get('editTrainerOffer', ['uses' =>'editProfileController@editTrainerOffer']);

Route::get('editEmailInfo', ['uses' =>'editProfileController@updateEmailInfo']);

Route::post('editPasswordInfo', ['uses' =>'editProfileController@editPasswordInfo']);

Route::post('store', ['uses' => 'PhotosController@store']);