<!-- ソリューション企業詳細 -->
@extends('layouts.common')
@section('title', 'ソリューション企業詳細')
@section('content')
    <div class="container">
        <div class="row">
            <!-- ソリューション情報 -->
            <div class="solution-group col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <h4 class="mt-2 px-2">ソリューション情報</h4>
                        <div class="media col-md-10 col-sm mx-auto">
                            <!--画像が登録されていない場合はno-image画像を挿入-->
                            @isset($solution_board->solution_image)
                            <img src="{{asset('public/solution/image/' . $board->solution_image) }}" class="img-fluid mr-3 mx-3">
                            @endisset
                            @empty($board->solution_image)
                            <img src="/storage/noimage.png" class="img-fluid mr-3 mx-3">
                            @endempty
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">ソリューションキーワード</h5>
                                <p>{{ $board->solution_keyword }}</p>
                            </div>
                        </div>
                        <div class="solution-others col-md-10 mx-auto px-2">
                            <h5 class="mt-2">ソリューション内容</h5>
                            <p>{{ $board->solution_detail }}</p>
                            <h5 class="mt-0">ソリューション実績</h5>
                            <p>{{ $board->solution_performance }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 会社情報 -->
            <div class="company-info col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <h4 class="mt-2 px-2">会社情報</h4>
                        <div class="media col-md-10 mx-auto">
                            <!--画像が登録されていない場合はno-image画像を挿入-->
                            @isset($board->logo_image)
                            <img src="{{asset('public/solution/image/' . $board->logo_image) }}" class="img-fluid mr-3 mx-3">
                            @endisset
                            @empty($board->logo_image)
                            <img src="/storage/noimage.png" class="img-fluid mr-3 mx-3">
                            @endempty
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">会社名</h5>
                                <p>{{ $board->public_name }}</p>
                                <h5 class="mt-0">地域</h5>
                                <p>{{ $board->area }}</p>
                                <h5 class="mt-0">住所</h5>
                                <p>{{ $board->address }}</p>
                                <h5 class="mt-0">電話番号</h5>
                                <p>{{ $board->phone_number }}</p>
                                <h5 class="mt-0">公式サイト</h5>
                                <p>{{ $board->url }}</p>
                            </div>
                        </div>
                        <div class="message col-md-10 mx-auto px-2">
                            <h5 class="mt-2">メッセージ</h5>
                            <p>{{ $board->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 担当者情報 -->
            <div class="contact-info col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <h4 class="mt-2 px-2">担当者情報</h4>
                        <div class="media col-md-10 mx-auto">
                            <!--画像が登録されていない場合はno-image画像を挿入-->
                            @isset($board->contact_image)
                            <img src="{{asset('public/solution/image/' . $board->contact_image) }}" class="img-fluid mr-3 mx-3">
                            @endisset
                            @empty($board->contact_image)
                            <img src="/storage/noimage.png" class="img-fluid mr-3 mx-3">
                            @endempty
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">担当者からのメッセージ</h5>
                                <p>{{ $board->contact_message }}</p>
                            </div>
                        </div>
                        <div class="text-center my-2 px-2">
                            <a href="{{ action('SolutionContactController@input', ['id' => $board->id]) }}" class="btn btn-primary">担当者に聞いてみる</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 他のソリューション情報がある場合 -->
            @if(count($other_boards) > 0)
            <div class="other-info col-md-8 mx-auto">
                <h4 class="my-2">この企業が持つその他のソリューション</h4>
                @foreach($other_boards as $board)
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <div class="media col-md-10 col-sm mx-auto">
                            <!--画像が登録されていない場合はno-image画像を挿入-->
                            @isset($solution_board->solution_image)
                            <img src="{{asset('public/solution/image/' . $board->solution_image) }}" class="img-fluid mr-3 mx-3">
                            @endisset
                            @empty($board->solution_image)
                            <img src="/storage/noimage.png" class="img-fluid mr-3 mx-3">
                            @endempty
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-2 ml-2">ソリューションキーワード</h5>
                                <p>{{ $board->solution_keyword }}</p>
                            </div>
                        </div>
                        <div class="text-right my-2 px-2">
                            <a href="{{ action('SolutionBoardController@show', ['id' => $board->id]) }}" class="btn btn-primary">詳細ページへ</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
