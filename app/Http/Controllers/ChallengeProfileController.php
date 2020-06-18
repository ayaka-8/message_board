<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\ChallengeProfile;
use App\User;

class ChallengeProfileController extends Controller
{
    /**
    *お悩み企業向けプロフィール登録、編集機能
    */
    //プロフィール新規登録入力
    public function add()
    {
        return view('profile.challenge.create');
    }
    /**
     *プロフィール登録
     * マイページへ
    */
    
    public function create(Request $request)
    {
        //validation
        $this->validate($request, ChallengeProfile::$rules);
        $challenge_profile = new ChallengeProfile;
        $form = $request->all();
        //画像を保存
        //TODO: 複数保存設定
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/challenge/image');
        } else {
            $challenge_profile->challenge_image = null;
        }
        // _tokenを削除
        unset($form['_token']);
        // imageを削除
        unset($form['image']);
        
        //ログインユーザーのidを取得
        $challenge_profile->user_id = Auth::id();
        //データベース に保存
        $challenge_profile->fill($form);
        $challenge_profile->save();
        //マイページへ
        return redirect()->route('challenge.mypage.show')->with('status', 'プロフィールを登録しました');
    }
    
    /**
     * マイページでユーザー情報とプロフィール情報を表示
    */
    public function show() 
    {
        //usersテーブルからユーザー情報を取得
        $user = Auth::user();
        //プロフィール情報がある場合ユーザーのプロフィール情報を取得
        if (ChallengeProfile::where('user_id', $user->id)) {
            $my_profiles = ChallengeProfile::where('user_id', $user->id)->get();
        } 
        
        return view('profile.challenge.mypage', [
            'my_profiles' => $my_profiles,
            'user' => $user
        ]);
    }
    
    /**
    *プロフィールの編集
    */
    public function edit()
    {
        $my_profile = ChallengeProfile::where('user_id', Auth::id())->first();
        return view('profile.challenge.edit', ['my_profile' => $my_profile]);
    }
    
    /**
     * プロフィールの更新->マイページ
     */
    public function update(Request $request)
    {
        /**
        *バリデーションを実行し、エラーがなければデータを更新してマイページへ戻る
        */
        //validation
        $this->validate($request, ChallengeProfile::$rules);
        //プロフィールの取得
        $my_profile = ChallengeProfile::where('user_id', Auth::id())->first();
        $form = $request->all();
        //TODO: 画像の保存
        
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        //マイページへ
        return redirect()->route('challenge.mypage.show')->with('status', 'プロフィール情報を更新しました');
    }
}
