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
    //お悩み企業向けプロフィールの登録、編集、更新、削除
    Route::get('profile/challenge/create', 'ChallengeProfileController@add');
    Route::post('profile/challenge/create', 'ChallengeProfileController@create');
    Route::get('profile/challenge/edit/{id}', 'ChallengeProfileController@edit');
    Route::post('profile/challenge/edit/{id}', 'ChallengeProfileController@update');
    Route::delete('profile/challenge/delete', 'ChallengeProfileController@delete');
    //ソリューション企業向けプロフィールの登録、編集、更新、削除
    Route::get('profile/solution/create', 'SolutionProfileController@add');
    Route::post('profile/solution/create', 'SolutionProfileController@create');
    Route::get('profile/solution/edit/{id}', 'SolutionProfileController@edit');
    Route::post('profile/solution/edit/{id}', 'SolutionProfileController@update');
    Route::delete('profile/solution/delete', 'SolutionProfileController@delete');
    //お悩み・ソリューション共通マイページ
    Route::get('mypage', 'MypageController@show')->name('mypage');
    // お悩み・ソリューション共通ユーザー情報編集、更新
    Route::get('mypage/edit', 'UserController@edit');
    Route::post('mypage/update', 'UserController@update');
});
/**
 * ログイン済みユーザー向けお問い合わせページ
 */
Route::group(['middleware' => 'auth'], function() {
    //お悩み企業宛て
    Route::get('challenge/contact', 'ChallengeContactController@input');
    Route::post('challenge/contact/confirm', 'ChallengeContactController@confirm');
    Route::post('challenge/contact/complete', 'ChallengeContactController@complete');
    //ソリューション企業宛て
    Route::get('solution/contact', 'SolutionContactController@input');
    Route::post('solution/contact/confirm', 'SolutionContactController@confirm');
    Route::post('solution/contact/complete', 'SolutionContactController@complete');
});

/**
 * 一般ユーザー向けページ
 */
 //ソリューション企業一覧、詳細
Route::get('solution/index', 'SolutionBoardController@index');
Route::get('solution/{id}', 'SolutionBoardController@show');
//お悩み一覧、詳細
Route::get('challenge/index', 'ChallengeBoardController@index');
Route::get('challenge/{id}', 'ChallengeBoardController@show');

Route::get('/','HomeController@index')->name('home');

Auth::routes();


