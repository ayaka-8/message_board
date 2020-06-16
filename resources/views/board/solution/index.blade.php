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
                        <img src="/storage/noimage.png" class="mx-3"><!-- TODO: alt -->
                        <div class="media-body px-2">
                            <h5 class="mt-0 ">ソリューションキーワード</h5>
                            <p>{{ $board->solution_keyword }}</p>
                            <h5 class="mt-0 ">ソリューション会社名</h5>
                            <p>{{ $board->public_name }}</p>
                            <div class="text-right">
                                <a href="#" class="btn btn-primary">詳細ページへ</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination text-center my-3">
                        {{ $solution_boards->links() }}
                    </div>
                </div>
                
                <!--
                <nav aria-label="Page navigation" class="my-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="{{ $solution_boards->links() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ $solution_boards->links() }}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $solution_boards->links() }}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $solution_boards->links() }}">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $solution_boards->links() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav> -->
            </div>
            
        </div>
    </div>
@endsection
