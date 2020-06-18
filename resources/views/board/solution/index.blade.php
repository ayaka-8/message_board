<!--ソリューション企業一覧 -->
@extends('layouts.common')
@section('title', 'ソリューション企業一覧')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- キーワード検索　-->
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
                <!-- 一覧表示 -->
                <div class="board-index col-md-8 mx-auto">
                    <h4>ソリューション企業一覧</h4>
                    @foreach($solution_boards as $board)
                    <div class="media">
                        @isset($board->logo_image)
                        <img src="{{ asset('public/solution/image/' . $board->logo_image) }}" class="mx-3">
                        @endisset
                        @empty($board->logo_image)
                        <img src="/storage/noimage.png" class="mx-3"><!-- TODO: alt -->
                        @endempty
                        <div class="media-body px-2">
                            <h5 class="mt-0 ">ソリューションキーワード</h5>
                            <p>{{ $board->solution_keyword }}</p>
                            <h5 class="mt-0 ">ソリューション会社名</h5>
                            <p>{{ $board->public_name }}</p>
                            <div class="text-right">
                                <a href="{{ action('SolutionBoardController@show', ['id' => $board->id]) }}" class="btn btn-primary">詳細ページへ</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination text-center my-3">
                        {{ $solution_boards->links() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection