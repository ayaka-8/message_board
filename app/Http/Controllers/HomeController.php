<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SolutionProfile;
use App\ChallengeProfile;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        return view('home', ['solutions' => $solutions, 'challenges' => $challenges]);
        
    }
}
