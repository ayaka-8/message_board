<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\ChallengeProfile;
use App\SolutionProfile;
use App\User;


class MypageController extends Controller
{
    /**
     * マイページでユーザー情報とプロフィール情報の表示
     */
    public function show() 
    {
        //usersテーブルからユーザー情報を取得
        $user = Auth::user();
        //ユーザーがソリューションプロフィールを持つ場合
        if (SolutionProfile::where('user_id', $user->id)) {
            $solution_profiles = SolutionProfile::where('user_id', $user->id)->get();
        } else {
            $solution_profiles = null;
        }
        //ユーザーがお悩みプロフィールを持つ場合
        if (ChallengeProfile::where('user_id', $user->id)) {
            $challenge_profiles = ChallengeProfile::where('user_id', $user->id)->get();
        } else {
            $challenge_profiles = null;
        }
        //画像がない場合のデフォルト用画像をs3から取得
        $no_image_url = Storage::disk('s3')->url('no_image/noimage.png');
        
        return view('profile.mypage', [
            'challenge_profiles' => $challenge_profiles,
            'solution_profiles' => $solution_profiles,
            'user' => $user,
            'no_image' => $no_image_url,
        ]);
    }
}
