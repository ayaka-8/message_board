<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class SolutionUserController extends Controller
{
    //ユーザー情報の編集
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('profile.user.edit', ['user' => $user]);
    }
    
    //ユーザー情報の更新->マイページ
    public function update(Request $request)
    {
        
        $user = User::find(Auth::id());
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        
        //マイページへ
        return redirect()->route('solution.mypage.show')->with('status', 'ユーザー情報を更新しました');
    }
    
}