<!-- ソリューション企業向けプロフィール編集画面　-->
@extends('layouts.common')
@section('title', 'プロフィール編集')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('SolutionProfileController@update', ['id' => $my_profile->id]) }}" method="post" enctype="multipart/form-data">
                    <!-- エラーメッセージ の表示 -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            入力に問題があります。再入力してください。
                        </div>
                    @endif
                    <!--　エラーがあれば編集中の内容を表示（全項目）　-->
                    <div class="form-group row">
                        <label class="col-md-3" >会社名 (公開名)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="public_name" value="{{ old('public_name', $my_profile->public_name) }}">
                            @if ($errors->has('public_name'))
                            <div class="text-danger">
                                {{$errors->first('public_name')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">会社ロゴ</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="logo_image">
                            @if ($errors->has('logo_image'))
                            <div class="text-danger">
                                {{$errors->first('logo_image')}}
                            </div>
                            @endif
                            <div class="form-text text-info">
                                @isset($my_profile->logo_image)
                                設定中: <img src="{{ old('logo_image', $my_profile->logo_image) }}" alt="ロゴ画像">
                                @endisset
                                @empty($my_profile->logo_image)
                                <p>画像は設定されていません</p>
                                @endempty
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="delete[]" value="{{$my_profile->logo_image }}">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">地域名</label></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="area" value="{{ old('area', $my_profile->area) }}">
                            @if ($errors->has('area'))
                            <div class="text-danger">
                                {{$errors->first('area')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">住所</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="address" rows="3">{{ old('address', $my_profile->address) }}</textarea>
                            @if ($errors->has('address'))
                            <div class="text-danger">
                                {{$errors->first('address')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">電話番号</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $my_profile->phone_number) }}">
                            @if ($errors->has('phone_number'))
                            <div class="text-danger">
                                {{$errors->first('phone_number')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">公式サイト</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="url" value="{{ old('url', $my_profile->url) }}">
                            @if ($errors->has('url'))
                            <div class="text-danger">
                                {{$errors->first('url')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューションキーワード<br>（主な事業分野）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="solution_keyword" row="3">{{ old('solution_keyword', $my_profile->solution_keyword) }}</textarea>
                            @if ($errors->has('solution_keyword'))
                            <div class="text-danger">
                                {{$errors->first('solution_keyword')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューション内容<br>（事業詳細）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="solution_detail" row="10">{{ old('solution_detail', $my_profile->solution_detail) }}</textarea>
                            @if ($errors->has('solution_detail'))
                            <div class="text-danger">
                                {{$errors->first('solution_detail')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューション実績<br>（事業実績）</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="solution_performance" row="10">{{ old('solution_performance', $my_profile->solution_performance) }}</textarea>
                            @if ($errors->has('solution_performance'))
                            <div class="text-danger">
                                {{$errors->first('solution_performance')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューションに関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="solution_image">
                            @if ($errors->has('solution_image'))
                            <div class="text-danger">
                                {{$errors->first('solution_image')}}
                            </div>
                            @endif
                            <div class="form-text text-info">
                                @isset($my_profile->solution_image)
                                設定中: <img src="{{ old('solution_image', $my_profile->solution_image) }}" alt="ソリューションに関する画像">
                                @endisset
                                @empty($my_profile->solution_image)
                                <p>画像は設定されていません</p>
                                @endempty
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="delete[]" value="{{$my_profile->solution_image}}">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="message" row="10">{{ old('message', $my_profile->message) }}</textarea>
                            @if ($errors->has('message'))
                            <div class="text-danger">
                                {{$errors->first('message')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者からのメッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="contact_message" row="10">{{ old('contact_message', $my_profile->contact_message) }}</textarea>
                            @if ($errors->has('contact_message'))
                            <div class="text-danger">
                                {{$errors->first('contact_message')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者に関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="contact_image">
                            @if ($errors->has('contact_image'))
                            <div class="text-danger">
                                {{$errors->first('contact_image')}}
                            </div>
                            @endif
                            <div class="form-text text-info">
                                @isset($my_profile->contact_image)
                                設定中: <img src="{{ old('contact_image', $my_profile->contact_image) }}" alt="担当者に関する画像">
                                @endisset
                                @empty($my_profile->contact_image)
                                <p>画像は設定されていません</p>
                                @endempty
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="delete[]" value="{{ $my_profile->contact_image }}">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者メールアドレス</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email', $my_profile->contact_email) }}">
                            @if ($errors->has('contact_email'))
                            <div class="text-danger">
                                {{$errors->first('contact_email')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $my_profile->id }}">
                        <input type="hidden" name="user_id" value="{{ $my_profile->user_id }}">
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
