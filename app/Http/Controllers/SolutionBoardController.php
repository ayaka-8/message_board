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
        //キーワード検索機能
        $search_keyword = $request->search_keyword;
        if (!empty($search_keyword)) {
            //検索されたら検索結果を表示
            $solution_boards = SolutionProfile::where('solution_keyword', 'like', '%'.$search_keyword.'%')
            ->OrWhere('solution_keyword', 'like', '%'.$search_keyword.'%')
            ->paginate(5);
        } else {
          //それ以外は全てのプロフィールを取得する
            $solution_boards = SolutionProfile::orderBy('public_name', 'desc')->paginate(5);
        }
        return view('board.solution.index', ['solution_boards' => $solution_boards, 'search_keyword' => $search_keyword]);
    }
    
    /**
     * ソリューション企業詳細表示機能
     */
    public function show(Request $request)
    {
        $solution_board = SolutionProfile::find($request->id);
        //ソリューションが複数ある場合
        //リクエストされたもの以外のプロフィール情報を取得する
        $other_boards = SolutionProfile::where([
            ['id', '!=', $solution_board->id],
            ['user_id', $solution_board->user_id]
            ])->get();
            
        return view('board.solution.show', ['board' => $solution_board, 'other_boards' => $other_boards]);
    }
    
}
