<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SolutionProfile;
use App\ChallengeProfile;

class TopController extends Controller
{
    /**
     * 新着情報一覧表示機能
     */
    public function index()
    {
        //新着ソリューション情報の取得
        $solutions = SolutionProfile::all()
                        ->sortByDesc('updated_at')
                        ->take(3);
                        
        //新着お悩み情報の取得
        $challenges = ChallengeProfile::all()
                        ->sortByDesc('updated_at')
                        ->take(3);
        return view('top', ['solutions' => $solutions, 'challenges' => $challenges]);
        
    }
}
