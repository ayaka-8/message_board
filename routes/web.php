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
Route::group(['middleware' => 'auth'], function() {
    /**
     * お悩み企業向け
     */
    //お悩み企業向けプロフィール登録、編集
    Route::get('profile/challenge/create', 'ChallengeProfileController@add');
    Route::post('profile/challenge/create', 'ChallengeProfileController@create');
    Route::get('profile/challenge/edit', 'ChallengeProfileController@edit');
    Route::post('profile/challenge/edit', 'ChallengeProfileController@update');
    Route::get('profile/challenge/mypage', 'ChallengeProfileController@show')->name('challenge.mypage.show');
    Route::get('profile/challenge/mypage/edit', 'ChallengeProfileController@edit');
    Route::post('profile/challenge/mypage/edit', 'ChllangeProfileController@update');
    //ユーザー情報の編集、更新
    Route::get('profile/challenge/mypage/user/edit', 'ChallengeUserController@edit');
    Route::post('profile/challenge/mypage/user/edit', 'ChallengeUserController@update');
    
    /**
     * ソリューション企業向け
     */
    //ソリューション企業向けプロフィール登録、編集
    Route::get('profile/solution/create', 'SolutionProfileController@add');
    Route::post('profile/solution/create', 'SolutionProfileController@create');
    Route::get('profile/solution/mypage', 'SolutionProfileController@show')->name('solution.mypage.show');
    Route::get('profile/solution/mypage/edit', 'SolutionProfileController@edit');
    Route::post('profile/solution/mypage/edit', 'SolutionProfileController@update');
    //ユーザー情報の編集、更新
    Route::get('profile/solution/mypage/user/edit', 'SolutionUserController@edit');
    Route::post('profile/solution/mypage/user/edit', 'SolutionUserController@update');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
