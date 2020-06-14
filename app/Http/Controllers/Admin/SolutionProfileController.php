<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\SolutionProfile;
use App\User;
//use App\Http\Request\MypageRequest;

class SolutionProfileController extends Controller
{
    //ソリューション企業向けプロフィール登録、編集機能
    //プロフィール新規登録入力
    public function add()
    {
        return view('admin.profile.solution.create');
    }
    //プロフィール登録->マイページへ
    public function create(Request $request)
    {
        //Validation
        $this->validate($request, SolutionProfile::$rules);
        $solution_profile = new SolutionProfile;
        $form = $request->all();
        //画像を保存（複数保存設定まだ!!!)
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
        return redirect()->route('mypage.show', ['id' => $solution_profile->user_id])->with('status', 'プロフィールを登録しました');
    }
    
    //マイページ
    public function show($id) 
    {
        //usersテーブルからユーザー情報を取得
        $user = Auth::user();
        //プロフィール情報がある場合ユーザーのプロフィール情報を取得
        if (SolutionProfile::where('user_id', $id)) {
            $my_profile = SolutionProfile::where('user_id', $id)->first();
        } 
        
        return view('admin.profile.solution.mypage', [
            'my_profile' => $my_profile,
            'user' => $user
            ]);
    }
    //プロフィール編集
    public function edit(Request $request)
    {
        $my_profile = SolutionProfile::where('user_id', $request->id)->first();
        return view('admin.profile.solution.edit', ['my_profile' => $my_profile]);
    }
    //プロフィール更新->マイページ
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, SolutionProfile::$rules);
        //プロフィールの取得
        $my_profile = SolutionProfile::where('user_id', $id)->first();
        $form = $request->all();
        //画像の保存
        //まだ!!
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        
        return redirect()->route('mypage.show', ['id' =>$my_profile->user_id ])->with('status', 'プロフィール情報を更新しました');
    } 

}
