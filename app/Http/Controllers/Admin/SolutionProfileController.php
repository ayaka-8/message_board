<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SolutionProfile;

class SolutionProfileController extends Controller
{
    //ソリューション企業向けプロフィール登録、編集機能
    public function add()
    {
        return view('admin.profile.solution.create');
    }

    public function create(Request $request)
    {
        //Validation
        $this->validate($request, SolutionProfile::$rules);
        $solution_profile = new SolutionProfile;
        $form = $request->all();
        //画像を保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/solution/image');
        } else {
            $solution_profile->solution_image = null;
        }
        // _tokenを削除
        unset($form['_token']);
        // imageを削除
        unset($form['image']);
        
        //データベースに保存
        $solution_profile->fill($form);
        $solution_profile->save();
        return redirect('admin/profile/solution/create');
    }

    public function edit()
    {
        return view('admin.profile.solution.edit');
    }

    public function update()
    {
        return redirect('admin/profile/solution/edit');
    }

}
