<!-- お悩み企業お問い合わせ完了画面 -->
@extends('layouts.common')
@section('title', 'お問い合わせ完了')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>お問い合わせ完了</h4>
                    </div>
                    <div class="card-body">
                        <p>お問い合わせいただきありがとうございました</p>
                    </div>
                </div>
                <!--ホーム画面へ戻るボタン-->
                <div class="content px-2 py-2">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="btn btn-success">トップへ戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
