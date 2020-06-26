<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //ユーザーがお悩みプロフィールを持つ場合
        if (SolutionProfile::where('user_id', $user->id)) {
            $solution_profiles = SolutionProfile::where('user_id', $user->id)->get();
        } else {
            $solution_profiles = null;
        }
        //ユーザーがソリューションプロフィールを持つ場合
        if (ChallengeProfile::where('user_id', $user->id)) {
            $challenge_profiles = ChallengeProfile::where('user_id', $user->id)->get();
        } else {
            $challenge_profiles = null;
        }
    
        return view('profile.mypage', [
            'challenge_profiles' => $challenge_profiles,
            'solution_profiles' => $solution_profiles,
            'user' => $user
        ]);
    }
}
