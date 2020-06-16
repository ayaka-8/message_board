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
/**
 * ログイン済みユーザー向けプロフィール登録、マイページ、編集ページ
 */
Route::group(['middleware' => 'auth'], function() {
    //お悩み企業向け
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
    
    //ソリューション企業向け
    Route::get('profile/solution/create', 'SolutionProfileController@add');
    Route::post('profile/solution/create', 'SolutionProfileController@create');
    Route::get('profile/solution/mypage', 'SolutionProfileController@show')->name('solution.mypage.show');
    Route::get('profile/solution/mypage/edit', 'SolutionProfileController@edit');
    Route::post('profile/solution/mypage/edit', 'SolutionProfileController@update');
    //ユーザー情報の編集、更新ページ
    Route::get('profile/solution/mypage/user/edit', 'SolutionUserController@edit');
    Route::post('profile/solution/mypage/user/edit', 'SolutionUserController@update');
});

/**
 * 一般ユーザー向けページ
 */
 //ソリューション企業一覧
Route::get('solution/index', 'SolutionBoardController@index');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
