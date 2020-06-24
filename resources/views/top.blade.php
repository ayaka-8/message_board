<!-- トップページ -->
@extends('layouts.common')
@section('title', '発見　世界のビジネスチャンス')
@section('content')
    <!--top part-->
    <div class="jumbotron jumbotron-fluid jumbotron-extend mb-0 pt-0">
        <div class="container-fluid jumbotron-container">
            <h1>世界を舞台に</h1>
        </div>
    </div>
    <!--サイト紹介-->
    <div class="jumbotron jumbotron-fluid text-center" style="background-color: white;">
        <div class="container-fluid">
                <h3>日本の技術で世界のお悩みを解決</h3>
                <p class="lead">このサイトは日本の中小企業と悩みを抱える海外の企業や自治体の情報を掲示し、ビジネスチャンスにつなげる掲示板サイトです。</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <!--新着情報-->
                <div class="latest-info col-md-10 mx-auto">
                    <div class="card my-3">
                        <div class="content px-2 py-2">
                            <h4 class="mt-2 px-2">新着情報</h4>
                            <div class="solution-info card my-3">
                                <div class="card-body">
                                    <h5 class="card-title">新着ソリューション情報</h5>
                                    @if (count($solutions) > 0)
                                    @foreach ($solutions as $solution)
                                    　<div class="solution-group">
                                    　    
                                    　   <div class="col-md-4">{{ $solution->updated_at }}</div>
                                    　   <div class="col-md-8">
                                    　       <a href="{{ action('SolutionBoardController@show', ['id' => $solution->id]) }}">{{ $solution->public_name }}</a>
                                    　   </div>
                                    　   <div class="col border-bottom">ソリューションキーワード：{{ $solution->solution_keyword }}</div>
                                    　</div>
                                    　@endforeach
                                      @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ action('SolutionBoardController@index') }}" class="btn btn-primary">ソリューション企業一覧ページへ</a>
                            </div>
                            <div class="challenge-info card my-3">
                                <div class="card-body">
                                    <h5 class="card-title">新着お悩み情報</h5>
                                    @if (count($challenges) > 0)
                                    @foreach ($challenges as $challenge)
                                    　<div class="challenge-group">
                                    　   <div class="col-md-4">{{ $challenge->updated_at }}</div>
                                    　   <div class="col-md-8">
                                    　       <a href="{{ action('ChallengeBoardController@show', ['id' => $challenge->id]) }}">{{ $challenge->public_name }}</a>
                                    　   </div>
                                    　   <div class="col border-bottom">お悩みキーワード：{{ $challenge->challenge_keyword }}</div>
                                    　</div>
                                    　@endforeach
                                      @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ action('ChallengeBoardController@index') }}" class="btn btn-primary">お悩み一覧ページへ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content px-2 py-2">
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn btn-success">新規登録はこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
