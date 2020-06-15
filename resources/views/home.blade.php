@extends('layouts.common')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインしました
                </div>
            </div><!-- ./card -->
            <!-- プロフィール情報がないユーザーに表示　-->
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">引き続きプロフィール情報の登録をお願いします。</p>
                </div>
                <div class="card-body">
                    <p class="card-text">製品をソリューションとして発信したい日本企業のみなさま</p>
                    <a href="{{ url('/profile/solution/create') }}" class="btn btn-primary">こちらから</a>
                </div>
                <div class="card-body">
                    <p class="card-text">お悩みを解決したい海外企業のみなさま</p>
                    <a href="{{ url('/profile/challenge/create') }}" class="btn btn-primary">こちらから</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
