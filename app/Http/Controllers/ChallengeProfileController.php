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
        //ロゴ画像
        if ($request->file('file')->inValid([])) {
            $path = $request->file('logo_image')->store('public/challenge/image');
            $challenge_profile->logo_image = basename($path);
        } else {
            $challenge_profile->logo_image = null;
        }
        //お悩みに関する画像
        if ($request->file('file')->inValid([])) {
            $path = $request->file('challenge_image')->store('public/challenge/image');
            $challenge_profile->challenge_image = basename($path);
        } else {
            $challenge_profile->challenge_image = null;
        }
        //担当者に関する画像
        if ($request->file('file')->inValid([])) {
            $path = $request->file('contact_image')->store('public/challenge/image');
            $challenge_profile->contact_image = basename($path);
        } else {
            $challenge_profile->contact_image = null;
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
    public function edit(Request $request)
    {
        //プロフィールの取得
        $my_profile = ChallengeProfile::find($request->id);
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
        $my_profile = ChallengeProfile::find($request->id);
        //編集内容の取得
        $form = $request->all();
        //画像の保存
        //ロゴ画像の更新
        if (isset($form['logo_image'])) {
            $path = $request->file('logo_image')->store('public/challenge/image');
            $my_profile->logo_image = basename($path);
            unset($my_profile->logo_image);
        } elseif(isset($request->remove)) {
            $my_profile->logo_image = null;
            unset($form['remove']);
        }
        //ソリューションに関する画像の更新
        if (isset($form['solution_image'])) {
            $path = $request->file('solution_image')->store('public/challenge/image');
            $my_profile->challenge_image = basename($path);
            unset($my_profile->challenge_image);
        } elseif(isset($request->remove)) {
            $my_profile->challenge_image = null;
            unset($form['remove']);
        }
        //担当者に関する画像の更新
        if (isset($form['contact_image'])) {
            $path = $request->file('contact_image')->store('public/challenge/image');
            $my_profile->contact_image = basename($path);
            unset($my_profile->contact_image);
        } elseif(isset($request->remove)) {
            $my_profile->contact_image = null;
            unset($form['remove']);
        } 
        
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'プロフィール情報を更新しました');
    }
}
