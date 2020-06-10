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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //お悩み企業向けプロフィール登録、編集
    Route::get('profile/challenge/create', 'Admin\ProfileController@addChallenge');
    Route::post('profile/challenge/create', 'Admin\ProfileController@createChallenge');
    Route::get('profile/challenge/edit', 'Admin\ProfileController@editChallenge');
    Route::post('profile/challenge/edit', 'Admin\ProfileController@updateChallenge');
    //ソリューション企業向けプロフィール登録、編集
    Route::get('profile/solution/create', 'Admin\ProfileController@addSolution');
    Route::post('profile/solution/create', 'Admin\ProfileController@createSolution');
    Route::get('profile/solution/edit', 'Admin\ProfileController@editSolution');
    Route::post('profile/solution/edit', 'Admin\ProfileController@updateSolution');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
