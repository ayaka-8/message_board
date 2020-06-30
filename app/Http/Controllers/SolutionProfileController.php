<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\SolutionProfile;
use App\User;


class SolutionProfileController extends Controller
{
    /**
    *ソリューション企業向けプロフィール登録、編集機能
    */
    //プロフィール新規登録入力
    public function add()
    {
        return view('profile.solution.create');
    }
    /**
     *プロフィール登録
    */
    //プロフィールの登録->マイページへ
    public function create(Request $request)
    {
        //Validation
        $this->validate($request, SolutionProfile::$rules);
        $solution_profile = new SolutionProfile;
        $form = $request->all();
        //画像を保存
        //ロゴ画像
        if ($request->file('file')->inValid([])) {
            $path = $request->file('logo_image')->store('public/solution/image');
            $solution_profile->logo_image = basename($path);
        } else {
            $solution_profile->logo_image = null;
        }
        //ソリューションに関する画像
        if ($request->file('file')->inValid([])) {
            $path = $request->file('solution_image')->store('public/solution/image');
            $solution_profile->solution_image = basename($path);
        } else {
            $solution_profile->solution_image = null;
        }
        //担当者に関する画像
        if ($request->file('file')->inValid([])) {
            $path = $request->file('contact_image')->store('public/solution/image');
            $solution_profile->contact_image = basename($path);
        } else {
            $solution_profile->contact_image = null;
        }
        // _tokenを削除
        unset($form['_token']);
        // imageを削除
        unset($form['image']);
        //ログインユーザーのidを取得
        $solution_profile->user_id = Auth::id();
        //データベースに保存
        $solution_profile->fill($form);
        $solution_profile->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'プロフィールを登録しました');
    }
    
    /**
    *プロフィールの編集
    */ 
    public function edit(Request $request)
    {
        //プロフィールの取得
        $my_profile = SolutionProfile::find($request->id);
        return view('profile.solution.edit', ['my_profile' => $my_profile]);
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
        $this->validate($request, SolutionProfile::$rules);
        //プロフィールの取得
        $my_profile = SolutionProfile::find($request->id);
        $form = $request->all();
        //画像の保存
        //ロゴ画像の更新
        if (isset($form['logo_image'])) {
            $path = $request->file('logo_image')->store('public/solution/image');
            $my_profile->logo_image = basename($path);
            unset($my_profile->logo_image);
        } elseif(isset($request->remove)) {
            $my_profile->logo_image = null;
            unset($form['remove']);
        }
        //ソリューションに関する画像の更新
        if (isset($form['solution_image'])) {
            $path = $request->file('solution_image')->store('public/solution/image');
            $my_profile->solution_image = basename($path);
            unset($my_profile->solution_image);
        } elseif(isset($request->remove)) {
            $my_profile->solution_image = null;
            unset($form['remove']);
        }
        //担当者に関する画像の更新
        if (isset($form['contact_image'])) {
            $path = $request->file('contact_image')->store('public/solution/image');
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
