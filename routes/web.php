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
Route::get('/', 'StudentController@index');

Auth::routes();

Route::get('/home', 'StudentController@index')->name('home');

Route::resource('students', 'StudentController');
Route::resource('lectures', 'LectureController');
Route::resource('grades', 'GradeController');