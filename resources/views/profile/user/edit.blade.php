<!-- マイページ内ユーザー情報編集画面　-->
@extends('layouts.common')
@section('title', 'ユーザー情報編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザー登録内容の編集</h2>
                <form action="{{ action('SolutionUserController@update') }}" method="post" enctype="multipart/form-data">
                    <!-- エラーメッセージ の表示 -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            入力に問題があります。再入力してください。
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3" >ユーザー名</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                            @if ($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メールアドレス</label></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                            @if ($errors->has('email'))
                            <div class="text-danger">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        {{ csrf_field() }}
                        <div class="form-group row mb-0">
                            <div class="text-center col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="更新">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
