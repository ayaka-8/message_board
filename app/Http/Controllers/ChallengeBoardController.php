<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ChallengeProfile;

class ChallengeBoardController extends Controller
{
    /**
     * お悩み一覧表示機能
     */
    public function index(Request $request)
    {
        //キーワード検索機能
        $search_keyword = $request->search_keyword;
        if (!empty($search_keyword)) {
            //検索されたら検索結果を表示
            $challenge_boards = ChallengeProfile::where('challenge_keyword', 'like', '%'.$search_keyword.'%')
            ->OrWhere('challenge_keyword', 'like', '%'.$search_keyword.'%')
            ->paginate(5);
        } else {
          //それ以外は全てのプロフィールを取得する
            $challenge_boards = ChallengeProfile::orderBy('public_name', 'desc')->paginate(5);
        }
        return view('board.challenge.index', ['challenge_boards' => $challenge_boards, 'search_keyword' => $search_keyword]);
    }
    
    /**
     * お悩み詳細表示機能
     */
    public function show(Request $request)
    {
        $challenge_board = ChallengeProfile::find($request->id);
        //お悩みが複数ある場合
        //リクエストされたもの以外のプロフィール情報を取得する
        $other_boards = ChallengeProfile::where([
            ['id', '!=', $challenge_board->id],
            ['user_id', $challenge_board->user_id]
            ])->get();
            
        return view('board.challenge.show', ['board' => $challenge_board, 'other_boards' => $other_boards]);
    }
    
}
