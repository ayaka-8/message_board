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
    Route::get('profile/challenge/create', 'Admin\ChallengeProfileController@add');
    Route::post('profile/challenge/create', 'Admin\ChallengeProfileController@create');
    Route::get('profile/challenge/edit', 'Admin\ChallengeProfileController@edit');
    Route::post('profile/challenge/edit', 'Admin\ChallengeProfileController@update');
    //ソリューション企業向けプロフィール登録、編集
    Route::get('profile/solution/create', 'Admin\SolutionProfileController@add');
    Route::post('profile/solution/create', 'Admin\SolutionProfileController@create');
    Route::get('profile/solution/mypage/{id}', 'Admin\SolutionProfileController@show')->name('mypage.show');
    Route::get('profile/solution/edit', 'Admin\SolutionProfileController@edit');
    Route::post('profile/solution/edit', 'Admin\SolutionProfileController@update');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
