<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SolutionProfile;

class SolutionBoardController extends Controller
{
    /**
     * ソリューション企業一覧表示機能
     */
    public function index(Request $request)
    {
        $search_keyword = $request->search_keyword;
        if ($search_keyword != '') {
            //検索されたら検索結果を表示
            $solution_boards = SolutionProfile::where('solution_keyword', $search_keyword)->paginate(5);
        } else {
          //それ以外は全てのプロフィールを取得する
            $solution_boards = SolutionProfile::orderBy('public_name', 'desc')->paginate(5);
        }
        return view('board.solution.index', ['solution_boards' => $solution_boards, 'search_keyword' => $search_keyword]);
    }
    
}
