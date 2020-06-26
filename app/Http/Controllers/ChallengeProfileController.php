<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\ChallengeProfile;
use App\User;
use Session;

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
    */
    //プロフィールの登録->マイページへ
    public function create(Request $request)
    {
        //validation
        $this->validate($request, ChallengeProfile::$rules);
        $challenge_profile = new ChallengeProfile;
        $form = $request->all();
        //画像を保存
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
        return redirect()->route('mypage')->with('status', 'プロフィールを登録しました');
    }
    
    /**
    *プロフィールの編集
    */
    public function edit()
    {
        //プロフィールの取得
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
        //編集内容の取得
        $form = $request->all();
        //画像の保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/challenge/image');
        } 
        
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'プロフィール情報を更新しました');
    }
}
