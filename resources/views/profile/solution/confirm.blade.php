<!-- プロフィール確認画面　-->
<!-- ソリューション向け -->
@extends('layouts.common')
@section('title', 'プロフィール入力内容確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール登録内容</h2>
                <form action="{{ action('SolutionProfileController@show')" method="post">
                    <table class="table table-striped">
                    <tr><td>会社名</td><td>{{ $public_name }}</td></tr>
                    <tr><td>会社ロゴ</td>
                    @isset($my_profile->logo_image)
                    <td>{{ $my_profile->logo_image }}</td>
                    @endisset
                    @empty($my_profile->logo_image)
                    <td>登録されていません</td>
                    @endempty
                    </tr>
                    <tr><td>地域</td><td>{{ $area }}</td></tr>
                    <tr><td>住所</td><td>{{ $address }}</td></tr>
                    <tr><td>電話番号</td><td>{{ $phone_number }}</td></tr>
                    <tr><td>公式サイト</td><td>{{ $url }}</td></tr>
                    <tr><td>ソリューションに関するキーワード</td><td>{{ $solution_keyword }}</td></tr>
                    <tr><td>ソリューションの内容</td><td>{{ $solution_detail }}</td></tr>
                    <tr><td>ソリューションの実績</td><td>{{ $solution_performance }}</td></tr>
                    <tr><td>ソリューションに関する画像</td>
                    @isset($my_profile->solution_image)
                    <td>{{ $my_profile->solution_image }}</td>
                    @endisset
                    @empty($my_profile->solution_image)
                    <td>登録されていません</td>
                    @endempty</tr>
                    <tr><td>メッセージ</td><td>{{ $message }}</td></tr>
                    <tr><td>担当者からのメッセージ</td><td>{{ $contact_message }}</td></tr>
                    <tr><td>担当者に関する画像</td>
                    @isset($my_profile->contact_image)
                    <td>{{ $my_profile->contact_image }}</td>
                    @endisset
                    @empty($my_profile->contact_image)
                    <td>登録されていません</td>
                    @endempty</tr>
                    <tr><td>担当者のメールアドレス</td><td>{{ $contact_email }}</td></tr>
                    </table>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection
