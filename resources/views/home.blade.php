<!-- トップページ -->
@extends('layouts.common')
@section('title', '発見　世界のビジネスチャンス')
@section('stylesheet')
<link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
@endsection
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="latest-info col-md-10 mx-auto">
                    <!--新着ソリューション情報-->
                    <div class="solution-info card col-md-10 mx-auto my-3 border-white">
                        <div class="card-body col">
                            <h5 class="col-12 col card-header px-3 text-light bg-dark">新着ソリューション情報</h5>
                            @if (count($solutions) > 0)
                            @foreach ($solutions as $solution)
                            <div class="solution-group col-12 col card-body px-1 py-2">
                                 <div class="updated_solutions-body row no-gutters flex-column flex-sm-column flex-md-column justify-md-content-around">
                                    　<a class="updated_solutions-body-item col-12 col-sm-12 col-md-12 col pt-2 pb-2 pb-sm-1 pb-md-2 px-1 px-sm-4 px-md-0 text-decoration-none text-center" href="{{ action('SolutionBoardController@show', ['id' => $solution->id]) }}">
                                    　     <div class="d-flex flex-row flex-sm-row flex-column align-items-center">
                                    　          <div class="col col-sm-4 col-md-4 col px-1 px-sm-0 px-md-1 pt-0 pt-sm-2 pt-md-0">
                                    　           　@if($solution->solution_image != null)
                                    　             <img width="120" height="100" layout="responsive" class="updated_solutions-body-item-img img-fluid _w-100 text-center" src="{{ $solution->solution_image }}">
                                    　           　@else
                                    　             <img width="120" height="100" layout="responsive" src="{{ $no_image }}" class="img-fluid _w-100 text-center mx-3">
                                    　             @endif
                                    　       　 </div>
                                    　       　 <div class="col col-sm-8 col-md-8 col px-1 px-sm-0 px-md-1">
                                    　       　　　    <div class="update_solutions-item-name text-left text-dark" >
                                    　           　　　    {{ $solution->public_name }}
                                    　           　 </div>
                                    　       　　　    <div class="updated_solutions-item-desc text-left text-dark col">
                                    　               　ソリューションキーワード： {{ $solution->solution_keyword }}
                                    　           　 </div>
                                    　       　　　    <div class="updated-solutions-item-date text-right text-dark">
                                    　           　　    {{ $solution->created_at->format('Y/m/d') }}
                                    　       　　　    </div>
                                    　       　 </div>
                                    　   　 </div>
                                    　</a>
                                 </div>
                            </div>
                        @endforeach
                        @endif
                        </div>
                        <div class="text-center">
                            <a href="{{ action('SolutionBoardController@index') }}" class="btn btn-primary">ソリューション一覧ページへ</a>
                        </div>
                    </div>
                    <!--新着お悩み情報-->
                    <div class="challenge-info card col-md-10 mx-auto my-3 border-white">
                        <div class="card-body col">
                            <h5 class="col-12 col card-header px-3 text-light bg-dark">新着お悩み情報</h5>
                            @if (count($challenges) > 0)
                            @foreach ($challenges as $challenge)
                            <div class="challenge-group col-12 card-body px-1 py-2">
                                <div class="updated-challenges-body row no-gutters flex-column flex-sm-column flex-md-column justify-md-content-around">
                                    <a class="updated_challenges-body-item col-12 col-sm-12 col-md-12 col pt-2 pb-2 pb-sm-1 pb-md-2 px-1 px-sm-4 px-md-0 text-decoration-none" href="{{ action('ChallengeBoardController@show', ['id' => $challenge->id]) }}">
                                        <div class="d-flex flex-row flex-sm-row flex-column align-items-center">
                                             <div class="col-4 col-sm-4 col-md-4 col px-1 px-sm-0 px-md-1 pt-0 pt-sm-2 pt-md-0">
                                                @if ($challenge->challenge_image != null)
                                    　           <img width="120" height="100" layout="responsive" class="updated_challenges-body-item-img img-fluid _w-100 text-center" src="{{ $challenge->challenge_image }}">
                                    　           @else
                                    　           <img width="120" height="100" layout="responsive" src="{{ $no_image }}" class="img-fluid _w-100 text-center mx-3">
                                    　          @endif
                                    　       </div>
                                    　       <div class="col-8 col-sm-8 col-md-8 col px-1 px-sm-0 px-md-1">
                                    　           <div class="update_solutions-item-name text-left text-dark">
                                    　               {{ $challenge->public_name }}
                                    　           </div>
                                    　           <div class="updated_challenges-item-desc text-left text-dark col">
                                    　              お悩みキーワード： {{ $challenge->challenge_keyword }}
                                    　           </div>
                                    　           <div class="updated_challenges-item-desc text-left text-dark">
                                    　               {{ $challenge->created_at->format('Y/m/d') }}
                                    　           </div>
                                    　       </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @endif
                        </div>
                        <div class="text-center">
                            <a href="{{ action('ChallengeBoardController@index') }}" class="btn btn-primary">お悩み一覧ページへ</a>
                        </div>
                    </div>
                </div>
                <!--新規ユーザー登録ボタン-->
                <div class="content px-2 py-2 mb-5">
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn btn-success">新規登録はこちらから</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
