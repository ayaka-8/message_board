<!-- ソリューション企業お問合わせ画面 -->
@extends('layouts.common')
@section('title', 'お問い合わせページ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        <h4>お問い合わせ</h4>
                    </div>
                    <div class="body px-2 py-2">
                        <form action="{{ action('SolutionContactController@confirm') }}" method="post">
                            <!--エラーメッセージの表示 -->
                            @if (count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                入力に問題があります。再入力してください。
                            </div>
                            @endif
                            <div class="form-group row mt-1">
                                <!-- お問い合わせしたい企業名の表示 -->
                                <label class="control-label col-md-3 mx-auto">お問い合わせしたい企業</label>
                                <div class="col-md-9">
                                    <!-- お問い合わせしたい企業のid　-->
                                    <input class="form-control" type="hidden" name="recipient_id" id="InputRecipientId" value="{{ old('recipient_id', $recipient_id) }}">
                                    <input class="form-control" name="recipient_name" type="text" id="InputRecipientName" value="{{ old('recipient_name', $recipient_name) }}" readonly> 
                                </div>
                                <label class="control-label col-md-3 mx-auto">お問い合わせ項目</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="subject">
                                        <option value="" selected="selected">選択してください</option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{ $subject }}" @if(old('subject')== $subject) selected @endif>{{ $subject }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('subject'))
                                    <div class="text-danger">
                                        {{ $errors->first('subject') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 mx-auto">名前</label>
                                <div class="col-md-9">
                                    <!-- ログインユーザーのidを取得 -->
                                    <input class="form-control" type="hidden" name="user_id" id="InputUserId" value="{{ old('user_id', $user_id) }}">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 mx-auto">メールアドレス</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 mx-auto">お問い合わせ内容</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="content" row="10">{{  old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                    <div class="text-danger">
                                        {{ $errors->first('content') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary my-2 mx-2" value="確認">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
