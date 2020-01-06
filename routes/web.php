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


Route::group(['middleware' => ['auth','teacher'],'prefix'=>'teacher', 'namespace'=>'Teacher'], function (){
    Route::get('/home', 'TeacherDashBoardController@index')->name('teacher.home');
    Route::resource('students', 'StudentController');
    Route::resource('courses', 'CourseController');
    Route::get('/marks/userId/{id}', 'MarksController@create')->name('marks.create');

    Route::post('/marks', 'MarksController@store')->name('marks.store');
});


//Route::group(['middleware' => 'auth:teacher','prefix'=>'teacher', 'namespace'=>'Teacher'], function (){
//    Route::get('/home', 'TeacherDashBoardController@index')->name('teacher.home');
//    Route::resource('students', 'StudentController');
//    Route::resource('courses', 'CourseController');
//    Route::get('/marks/userId/{id}', 'MarksController@create')->name('marks.create');
//
//    Route::post('/marks', 'MarksController@store')->name('marks.store');
//
//
//});

Route::group(['middleware' => ['auth','student'],'prefix'=>'student', 'namespace'=>'Student'], function (){
    Route::get('/home', 'StudentDashBoardController@index')->name('student.home');
    Route::get('/student/edit', 'StudentDashBoardController@studentEdit')->name('student-edit');
    Route::post('/image/update', 'StudentDashBoardController@imageUpdate')->name('image.update');
    Route::post('/student/update', 'StudentDashBoardController@studentUpdate')->name('student-update');
    Route::get('/view-result', 'StudentDashBoardController@showResult')->name('student.result');

});

//Route::group(['middleware' => 'auth:student','prefix'=>'student', 'namespace'=>'Student'], function (){
//    Route::get('/home', 'StudentDashBoardController@index')->name('student.home');
//    Route::get('/student/edit', 'StudentDashBoardController@studentEdit')->name('student-edit');
//    Route::post('/image/update', 'StudentDashBoardController@imageUpdate')->name('image.update');
//    Route::post('/student/update', 'StudentDashBoardController@studentUpdate')->name('student-update');
//    Route::get('/view-result', 'StudentDashBoardController@showResult')->name('student.result');
//
//});

Route::group(['prefix' => 'teacher'], function () {

//    Route::get('/home', 'TeacherController@index')->name('teacher.home');
//
//
//    Route::get('/student-create', 'TeacherController@create')->name('student.create');
//    Route::get('/student-list', 'TeacherController@showStudent')->name('student.show');
//    Route::post('/student-create', 'TeacherController@store')->name('student.store');
//
//    Route::resource('students', 'StudentController');


    Route::get('/login', 'Teacher\LoginController@showLoginForm')->name('teacher.login');
    Route::post('/login', 'Teacher\LoginController@login');
    Route::post('/logout', 'Teacher\LoginController@logout')->name('teacher.logout');

    Route::get('/register', 'Teacher\RegisterController@showRegistrationForm')->name('teacher.register');
    Route::post('/register', 'Teacher\RegisterController@register');


    Route::get('/password/reset', 'Teacher\ForgotPasswordController@showLinkRequestForm')->name('teacher.password.request');
    Route::post('/password/email', 'Teacher\ForgotPasswordController@sendResetLinkEmail')->name('teacher.password.email');
    Route::get('/password/reset/{token}', 'Teacher\ResetPasswordController@showResetForm')->name('teacher.password.reset');
    Route::post('/password/reset', 'Teacher\ResetPasswordController@reset')->name('teacher.password.update');
});

Route::group(['prefix' => 'student'], function () {

//    Route::get('/home', 'StudentController@index')->name('student.home');

    Route::get('/login', 'Student\LoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Student\LoginController@login');
    Route::post('/logout', 'Student\LoginController@logout')->name('student.logout');

    Route::get('/register', 'Student\RegisterController@showRegistrationForm')->name('student.register');
    Route::post('/register', 'Student\RegisterController@register');


    Route::get('/password/reset', 'Student\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('/password/email', 'Student\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password/reset/{token}', 'Student\ResetPasswordController@showResetForm')->name('student.password.reset');
    Route::post('/password/reset', 'Student\ResetPasswordController@reset')->name('student.password.update');
});



