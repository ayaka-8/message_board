<!-- マイページトップ　-->
<!-- お悩み企業向け -->
@extends('layouts.common')
@section('title', 'マイページ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>マイページ</h2>
                <div class="card my-3">
                    <div class="user-group col-md-10 mx-auto my-3">
                        <h4>ユーザー登録内容</h4>
                            <div class="user card my-2">
                                <table class="table table-striped">
                                    <tr><td>ユーザー名</td><td>{{ $user->name }}</td></tr>
                                    <tr><td>メールアドレス</td><td>{{ $user->email }}</td></tr>
                                </table>
                            </div>
                        <div class="text-center">
                            <a href="{{ action('ChallengeUserController@edit') }}" class="btn btn-primary pull-center">編集</a>
                        </div>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="profile-group col-md-10 mx-auto my-3">
                       <h4>プロフィール登録内容</h4>
                       <!--プロフィール情報ある場合 -->
                       @if ($my_profiles) 
                       @foreach($my_profiles as $my_profile)
                       <div class="profile card my-2">
                            <table class="table table-striped">
                                <tr><td>会社名</td><td>{{ $my_profile->public_name }}</td></tr>
                                <tr><td>会社ロゴ</td>
                                @isset($my_profile->logo_image)
                                <td>{{ $my_profile->logo_image }}</td>
                                @endisset
                                @empty($my_profile->logo_image)
                                <td><img src="/storage/noimage.png"></td>
                                @endempty
                                </tr>
                                <tr><td>地域</td><td>{{ $my_profile->area }}</td></tr>
                                <tr><td>住所</td><td>{{ $my_profile->address }}</td></tr>
                                <tr><td>電話番号</td><td>{{ $my_profile->phone_number }}</td></tr>
                                <tr><td>公式サイト</td><td>{{ $my_profile->url }}</td></tr>
                                <tr><td>お悩み関するキーワード</td><td>{{ $my_profile->challenge_keyword }}</td></tr>
                                <tr><td>現在の状況や課題</td><td>{{ $my_profile->challenge_detail }}</td></tr>
                                <tr><td>お悩みに関する画像</td>
                                @isset($my_profile->solution_image)
                                <td>{{ $my_profile->solution_image }}</td>
                                @endisset
                                @empty($my_profile->solution_image)
                                <td><img src="/storage/noimage.png"></td>
                                @endempty</tr>
                                <tr><td>相談者が考える解決策</td><td>{{ $my_profile->challenge_method }}</td></tr>
                                <tr><td>メッセージ</td><td>{{ $my_profile->message }}</td></tr>
                                <tr><td>担当者からのメッセージ</td><td>{{ $my_profile->contact_message }}</td></tr>
                                <tr><td>担当者に関する画像</td>
                                @isset($my_profile->contact_image)
                                <td>{{ $my_profile->contact_image }}</td>
                                @endisset
                                @empty($my_profile->contact_image)
                                <td><img src="/storage/noimage.png"></td>
                                @endempty</tr>
                                <tr><td>担当者のメールアドレス</td><td>{{ $my_profile->contact_email }}</td></tr>
                            </table>
                            <div class="text-center my-2 px-2">
                                <a href="{{ action('ChallengeProfileController@edit') }}" class="btn btn-primary">編集</a>
                            </div>
                            </div>
                            @endforeach
                            @else <!--プロフィール情報がなかった場合 -->
                            <div class="text-center my-2 px-2">
                               <p>プロフィールは登録されていません</p>
                                <a href="{{ action('ChallengeProfileController@add') }}" class="btn btn-primary">登録</a>
                           </div>
                           @endif
                    </div>
                </div>
            </div> 
        </div>
    </div>
@endsection
