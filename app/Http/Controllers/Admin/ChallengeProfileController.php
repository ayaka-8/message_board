<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChallengeProfileController extends Controller
{
    //お悩み企業向けプロフィール登録、編集機能
    public function add()
    {
        return view('admin.profile.challenge.create');
    }

    public function create(Request $request)
    {
        return redirect('admin/profile/challenge/create');
    }

    public function edit()
    {
        return view('admin.profile.challenge.edit');
    }

    public function update()
    {
        return redirect('admin/profile/challenge/edit');
    }
}
