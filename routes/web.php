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
//department routes
Route::get('departments','DepartmentController@index');
Route::get('department/create','DepartmentController@create');
Route::post('department/departmentSave','DepartmentController@departmentSave');
Route::get('department/departmentEdit/{id}','DepartmentController@departmentEdit');
Route::post('department/departmentUpdate/{id}','DepartmentController@departmentUpdate');
Route::delete('department/departmentDelete/{id}','DepartmentController@departmentDelete');

//semester routes
Route::get('semesters','SemesterController@index');
Route::get('semester/create','SemesterController@create');
Route::post('semester/semesterSave','SemesterController@semesterSave');
Route::get('semester/semesterEdit/{id}','SemesterController@semesterEdit');
Route::post('semester/semesterUpdate/{id}','SemesterController@semesterUpdate');
Route::delete('semester/semesterDelete/{id}','SemesterController@semesterDelete');



//student route

Route::get('students','StudentController@index');

Route::get('student/create','StudentController@create');
Route::post('student/studentSave','StudentController@studentSave');
Route::get('student/studentEdit/{id}','StudentController@studentEdit');
Route::post('student/studentUpdate/{id}','StudentController@studentUpdate');
Route::delete('student/studentDelete/{id}','StudentController@studentDelete');
//Route::get('student/studentSearch','StudentController@studentSearch');
//Route::get('student/action', 'StudentController@action');
Route::get('/student/studentSearch', 'StudentController@studentSearch')->name('studentSearch');
Route::get('/student/studentSearch/action', 'StudentController@action')->name('studentSearch.action');
Route::get('/student/studentSearch/tableLoad', 'StudentController@tableLoad')->name('studentSearch.tableLoad');


//search
//Route::get('LiveSearch/action', 'LiveSearch@action')->name('LiveSearch.action');

//Attendence
Route::get('Attendence/studentAttendence','StudentAttendenceController@studentAttendence')->name('studentAttendence');
Route::post('Attendence/saveAttendence','StudentAttendenceController@saveAttendence')->name('saveAttendence');
