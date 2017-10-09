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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//students middleware group
Route::group(['middleware' => 'auth'], function(){
	Route::get('/{session}/semesters','Students\SessionsController@sessions');
	Route::get('/{session}/{semester}/semestercourses','Students\SessionsController@semesterCourses');
	Route::get('/{session}/{semester}/{course}/grades','Students\SessionsController@grades');

	//course Registration
	Route::get('/students/{session}/{semester}/getcoursedata','Students\SessionsController@getCourseData');
	Route::get('/students/{session}/{semester}/courseregistration','Students\SessionsController@courseRegistration');
});