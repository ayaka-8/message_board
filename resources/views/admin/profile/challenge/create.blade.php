<!-- お悩み企業向けプロフィール新規登録画面 -->
@extends('layouts.admin')
@section('title', 'プロフィール登録')
@section('content')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>プロフィール登録（海外企業向け）</h2>
                <form action="{{ action('Admin\ProfileController@createChallenge') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">会社名 (公開名)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="public_name" value="{{ old('public_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ロゴ画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">地域名</label></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="area" value="{{ old('area') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">住所</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="address" rows="3">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">電話番号</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone_number">{{ old('phone_number') }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">公式サイト</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="url">{{ old('url') }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">お悩みキーワード<br>（複数ある場合は半角カンマ「,」で区切ってください）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_keyword" row="3">{{ old('challenge_keyword') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">現在の状況や課題</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_detail" row="10">{{ old('challenge_detail') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">現在の状況に関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="challenge_image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">相談者が考える解決策</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_method" row="10">{{ old('challenge_method') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="message" row="10">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者からのメッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="contact_message" row="10">{{ old('contact_message') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者に関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="contact_image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者メールアドレス</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact_email">{{ old('contact_email') }}
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection
