<!-- ソリューション企業向けプロフィール登録画面 -->

@extends('layouts.common')
@section('title', 'プロフィール登録')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>プロフィール登録（日本企業向け）</h2>
                <form action="{{ action('SolutionProfileController@create') }}" method="post" enctype="multipart/form-data">
                    <!-- エラーメッセージ の表示 -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            入力に問題があります。再入力してください。
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">会社名 (公開名)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="public_name" value="{{ old('public_name') }}" placeholder="例：○△株式会社">
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
                            <small class="input_condidion">*形式: jpg, jpeg, png</small>
                            <small class="input_condidion">*最大サイズ: 250 x 250px</small>
                            @if ($errors->has('logo_image'))
                            <div class="text-danger">
                                {{$errors->first('logo_image')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">地域名</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="area" value="{{ old('area') }}" placeholder="例: 関東">
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
                            <textarea class="form-control" name="address" rows="3" placeholder="例: ○○県□□市...">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                            <div class="text-danger">
                                {{$errors->first('address')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">電話番号<br>(数字のみ半角で入力してください)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="例: 0000000000">
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
                            <input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="例: https://...">
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
                            <textarea class="form-control" name="solution_keyword" row="3" placeholder="例: 精密加工, 医療機器...">{{ old('solution_keyword') }}</textarea>
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
                            <textarea class="form-control" name="solution_detail" row="10" placeholder="例: 医療機器メーカーから受注し、精密機器を製造、加工しています。">{{ old('solution_detail') }}</textarea>
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
                            <textarea class="form-control" name="solution_performance" row="10" placeholder="例: タイの医療メーカーからの受注を開始しました。">{{ old('solution_performance') }}</textarea>
                            @if ($errors->has('solution_performance'))
                            <div class="text-danger">
                                {{$errors->first('solution_performance')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">ソリューションに関する<br>画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="solution_image">
                            <small class="input_condidion">*形式: jpg, jpeg, png<br></small>
                            <small class="input_condidion">*最大サイズ: 250 x 250px</small>
                            @if ($errors->has('solution_image'))
                            <div class="text-danger">
                                {{$errors->first('solution_image')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="message" row="10" placeholder="例: 今後の展望や計画など">{{ old('message') }}</textarea>
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
                            <textarea class="form-control" name="contact_message" row="10">{{ old('contact_message') }}</textarea>
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
                            <small class="input_condidion">*形式: jpg, jpeg, png<br></small>
                            <small class="input_condidion">*最大サイズ: 250 x 250px</small>
                            @if ($errors->has('contact_image'))
                            <div class="text-danger">
                                {{$errors->first('contact_image')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者メールアドレス</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email') }}">
                            @if ($errors->has('contact_email'))
                            <div class="text-danger">
                                {{$errors->first('contact_email')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group row mb-0">
                        <div class="text-center col-md-6 offset-md-4">
                            <input type="submit" class="btn btn-primary" value="登録">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
