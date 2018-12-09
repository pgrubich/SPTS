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

Route::post('/profiles/addOpinion', ['uses' =>'OpinionController@create']);

Route::view('/profiles/{id}', 'profile');

Route::view('/{dycyplina}/{miasto}', 'searchDisciplineAndLocationResult');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('editPrimaryInfo', ['uses' =>'editProfileController@updatePrimaryInfo']);

Route::post('addCity', ['uses' =>'editProfileController@addCity']);

Route::post('editSpecificInfo', ['uses' =>'editProfileController@updateSpecificInfo']);

Route::post('updateDisciplines', ['uses' =>'editProfileController@updateDisciplines']);

Route::post('addCourse', ['uses' =>'editProfileController@addCourse']);

Route::post('editCourse', ['uses' =>'editProfileController@editCourse']);

Route::post('/destroyCourse/{id}', ['uses' =>'editProfileController@destroyCourse']);

Route::post('addUni', ['uses' =>'editProfileController@addUni']);

Route::post('editUni', ['uses' =>'editProfileController@editUni']);

Route::post('/destroyUni/{id}', ['uses' =>'editProfileController@destroyUni']);

Route::post('addTrainerOffer', ['uses' =>'editProfileController@addTrainerOffer']);

Route::post('editTrainerOffer', ['uses' =>'editProfileController@editTrainerOffer']);

Route::post('/destroyOffer/{id}', ['uses' =>'editProfileController@destroyOffer']);

Route::post('editEmailInfo', ['uses' =>'editProfileController@updateEmailInfo']);

Route::post('editPasswordInfo', ['uses' =>'editProfileController@editPasswordInfo']);

Route::post('store', ['uses' => 'PhotosController@store']);

Route::post('/destroy/{id}', ['uses' => 'PhotosController@destroy']);

Route::post('addProfilePicture', ['uses' => 'PhotosController@addProfilePicture']);

Route::post('/updateProfilePicture/{id}', ['uses' =>'PhotosController@updateProfilePicture']);

Route::post('destroyProfilePicture', ['uses' => 'PhotosController@destroyProfilePicture']);

Route::post('orderTraining', ['uses' =>'CalendarController@orderTraining']);
