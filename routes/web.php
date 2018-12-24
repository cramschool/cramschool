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


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend/companies/edit', 'CompanyController@edit');

Route::post('/backend/companies/edit', 'CompanyController@update');
// Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
//     Route::name('backend.')->group(function () {
//         Route::resource('companies', 'CompanyController');
//     });
// });

// Route::post('/admin/company', 'CompanyController@update')->name('admin/company');

Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::name('backend.')->group(function () {
        Route::resource('bulletin_boards', 'Bulletin_boardsController');
    });
});
Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::name('backend.')->group(function () {
        Route::resource('carousels', 'CarouselsController');
    });
});
Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::name('backend.')->group(function () {
        Route::resource('classrooms', 'ClassroomsController');
    });
});
Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::name('backend.')->group(function () {
        Route::resource('transcripts', 'TranscriptsController');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::name('backend.')->group(function () {
        Route::resource('users', 'UsersController');
    });
});