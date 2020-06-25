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
     * マイページへ
    */
    
    public function create(Request $request)
    {
        //Validation
        $this->validate($request, SolutionProfile::$rules);
        $solution_profile = new SolutionProfile;
        $form = $request->all();
        //画像を保存
        //TODO: 複数保存設定
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/solution/image');
        } else {
            $solution_profile->solution_image = null;
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
     * マイページでユーザー情報とプロフィール情報を表示
    */
    public function show() 
    {
        //usersテーブルからユーザー情報を取得
        $user = Auth::user();
        //プロフィール情報がある場合ユーザーのプロフィール情報を取得
        if (SolutionProfile::where('user_id', $user->id)) {
            $my_profiles = SolutionProfile::where('user_id', $user->id)->get();
        } 
        
        return view('profile.solution.mypage', [
            'my_profiles' => $my_profiles,
            'user' => $user
        ]);
    }
    
    /**
    *プロフィールの編集
    */ 
    public function edit()
    {
        
        $my_profile = SolutionProfile::where('user_id', Auth::id())->first();
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
        $my_profile = SolutionProfile::where('user_id', Auth::id())->first();
        $form = $request->all();
        //TODO: 画像の保存
        
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'プロフィール情報を更新しました');
    } 

}
