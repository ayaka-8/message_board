<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //お悩み企業向け
    public function addChallenge()
    {
        return view('admin.profile.challenge.create');
    }

    public function createChallenge(Request $request)
    {
        return redirect('admin/profile/challenge/create');
    }

    public function editChallenge()
    {
        return view('admin.profile.challenge.edit');
    }

    public function updateChallenge()
    {
        return redirect('admin/profile/challenge/edit');
    }
    //お悩み企業向けここまで
    //ソリューション企業向け
    public function addSolution()
    {
        return view('admin.profile.solution.create');
    }

    public function createSolution(Request $request)
    {
        return redirect('admin/profile/solution/create');
    }

    public function editSolution()
    {
        return view('admin.profile.solution.edit');
    }

    public function updateSolution()
    {
        return redirect('admin/profile/solution/edit');
    }
    //ソリューション企業ここまで

}
