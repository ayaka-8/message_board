<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChallengeProfile;

class ChallengeProfileController extends Controller
{
    //お悩み企業向けプロフィール登録、編集機能
    public function add()
    {
        return view('profile.challenge.create');
    }

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
        
        //データベース に保存
        $challenge_profile->fill($form);
        $challenge_profile->save();
        
        return redirect('profile/challenge/create');
    }

    public function edit()
    {
        return view('profile.challenge.edit');
    }

    public function update()
    {
        return redirect('profile/challenge/edit');
    }
}
