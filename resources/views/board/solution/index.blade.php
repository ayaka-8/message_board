<!--ソリューション企業一覧 -->
@extends('layouts.common')
@section('title', 'ソリューション一覧')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- キーワード検索　-->
                <div class="content px-2 py-2">
                    <form action="{{ action('SolutionBoardController@index') }}" method="get">
                        <div class="form-group row">
                            <label class="col-md-2">キーワード</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="search_keyword" value="{{ $search_keyword }}">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- 一覧表示 -->
                <div class="board-index col-md-8 mx-auto">
                    <div class="content px-2 py-2">
                        <h4>ソリューション一覧</h4>
                        @if(count($solution_boards) > 0)
                        @foreach($solution_boards as $board)
                        <div class="media">
                            @if($board->solution_image != null)
                            <!--ソリューションに関する画像の表示-->
                            <img src="{{ $board->solution_image }}" class="mx-3" alt="ソリューションに関する画像の表示">
                            @else
                            <img src="{{ $no_image }}" class="mx-3">
                            @endif
                            <div class="media-body px-2">
                                <h5 class="mt-0 ">ソリューションキーワード</h5>
                                <p>{!! nl2br($board->solution_keyword) !!}</p>
                                <h5 class="mt-0 ">ソリューション会社名</h5>
                                <p>{{ $board->public_name }}</p>
                                <div class="text-right">
                                    <a href="{{ action('SolutionBoardController@show', ['id' => $board->id]) }}" class="btn btn-primary">詳細ページへ</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--検索条件に合うデータがなかった場合-->
                    @else
                    <div class="card no-board text-center my-3">
                        <div class="card-body">
                            <p class="card-text">検索条件を変えてもう一度検索してください</p>
                        </div>
                    </div>
                    @endif
                    </div>
                    <div class="pagination text-center my-3">
                        {{ $solution_boards->links() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
