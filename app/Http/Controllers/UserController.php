<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    //ユーザー情報の編集
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('profile.user.edit', ['user' => $user]);
    }
    
    //ユーザー情報の更新->マイページ
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        
        //マイページへ
        return redirect()->route('mypage.show', ['id' =>$id])->with('status', 'ユーザー情報を更新しました');
    }
    
}
