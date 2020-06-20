<!-- お悩み企業一覧 -->
@extends('layouts.common')
@section('title', 'お悩み一覧')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- キーワード検索　-->
                <div class="content px-2 py-2">
                    <form action="{{ action('ChallengeBoardController@index') }}" method="get">
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
                        <h4>お悩み一覧</h4>
                        @foreach($challenge_boards as $board)
                        <div class="media">
                            @isset($board->logo_image)
                            <img src="{{ asset('public/challenge/image/' . $board->logo_image) }}" class="mx-3">
                            @endisset
                            @empty($board->logo_image)
                            <img src="/storage/noimage.png" class="mx-3"><!-- TODO: alt -->
                            @endempty
                            <div class="media-body px-2">
                                <h5 class="mt-0 ">お悩みキーワード</h5>
                                <p>{{ $board->challenge_keyword }}</p>
                                <h5 class="mt-0 ">会社（所属先）名</h5>
                                <p>{{ $board->public_name }}</p>
                                <div class="text-right">
                                    <a href="{{ action('ChallengeBoardController@show', ['id' => $board->id]) }}" class="btn btn-primary">詳細ページへ</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination text-center my-3">
                        {{ $challenge_boards->links() }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
