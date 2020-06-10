<!-- ソリューション企業向けプロフィール登録画面 -->
@extends('layouts.admin')
@section('title', 'プロフィール登録')
@section('content')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>プロフィール登録（日本企業向け）</h2>
                <form action="{{ action('Admin\ProfileController@createSolution') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
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
                        <label class="col-md-3">会社ロゴ</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="logo_image">
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
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">公式サイト</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューションキーワード<br>（主な事業分野）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="solution_keyword" row="3">{{ old('solution_keyword') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューション内容<br>（事業詳細）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="solution_detail" row="10">{{ old('solution_detail') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューション実績<br>（事業実績）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="solution_performance" row="10">{{ old('solution_performance') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューションに関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="solution_image">
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
                            <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection
