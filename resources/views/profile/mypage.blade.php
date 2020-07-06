<!-- マイページトップ　-->
@extends('layouts.common')
@section('title', 'マイページ (My Account)')
@section('content')
    <!--お悩みプロフィールがある場合 -->
    @if(count($challenge_profiles) > 0)
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>My Account</h2>
                <div class="user-profile card my-3">
                    <!--お悩みユーザー情報-->
                    <div class="user-group col-md-10 mx-auto my-3">
                        <h4>User Profile</h4>
                            <div class="user card my-2">
                                <table class="table table-striped">
                                    <tr><td>User Name</td><td>{{ $user->name }}</td></tr>
                                    <tr><td>Email</td><td>{{ $user->email }}</td></tr>
                                </table>
                            </div>
                        <div class="text-center">
                            <a href="{{ action('UserController@edit') }}" class="btn btn-primary pull-center">Edit</a>
                        </div>
                    </div>
                </div><!--/user-profile -->
                <div class="challenge-profile card my-3">
                    <div class="profile-group col-md-10 mx-auto my-3">
                       <h4>Client Profile</h4>
                        <!--お悩みプロフィール -->
                       @foreach($challenge_profiles as $my_profile)
                       <div class="challenge-profile card my-2">
                            <table class="table table-striped">
                                <tr><td>Company Name</td><td>{{ $my_profile->public_name }}</td></tr>
                                <tr><td>Company Logo</td>
                                @isset($my_profile->logo_image)
                                <td><img class="img-fluid" src="{{ $my_profile->logo_image }}" alt="Company Logo"></td>
                                @endisset
                                @empty($my_profile->logo_image)
                                <td><img src="{{ $no_image }}"></td>
                                @endempty
                                </tr>
                                <tr><td>Area</td><td>{{ $my_profile->area }}</td></tr>
                                <tr><td>Address</td><td>{{ $my_profile->address }}</td></tr>
                                <tr><td>Phone</td><td>{{ $my_profile->phone_number }}</td></tr>
                                <tr><td>Official Website</td><td>{{ $my_profile->url }}</td></tr>
                                <tr><td>Keywords for Your Challenges</td><td>{!! nl2br($my_profile->challenge_keyword) !!}</td></tr>
                                <tr><td>Current Situations and Challenges</td><td>{!! nl2br($my_profile->challenge_detail) !!}</td></tr>
                                <tr><td>Image for Your Current Challenge</td>
                                @isset($my_profile->challenge_image)
                                <td><img class="img-fluid" src="{{ $my_profile->challenge_image }}" alt="Image for Your Current Challenge"></td>
                                @endisset
                                @empty($my_profile->challenge_image)
                                <td><img class="img-fluid" src="{{ $no_image }}"></td>
                                @endempty</tr>
                                <tr><td>Expected Solution</td><td>{!! nl2br($my_profile->challenge_method) !!}</td></tr>
                                <tr><td>Message</td><td>{!! nl2br($my_profile->message) !!}</td></tr>
                                <tr><td>Message from the Contact</td><td>{!! nl2br($my_profile->contact_message) !!}</td></tr>
                                <tr><td>Image for the Contact</td>
                                @isset($my_profile->contact_image)
                                <td><img class="img-fluid" src="{{ $my_profile->contact_image }}" alt="Image for the Contact"></td>
                                @endisset
                                @empty($my_profile->contact_image)
                                <td><img class="img-fluid" src="{{ $no_image }}"></td>
                                @endempty</tr>
                                <tr><td>Email of the Contact</td><td>{{ $my_profile->contact_email }}</td></tr>
                            </table>
                            <!--お悩みプロフィール編集・削除ボタン-->
                            <div class="text-center my-2 px-2">
                                <a href="{{ action('ChallengeProfileController@edit', ['id' => $my_profile]) }}" class="btn btn-primary">Edit</a>
                                <!--モーダルを開く-->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProfile{{$my_profile->id}}">Delete</button>
                            </div>
                            <!--モーダル（お悩みプロフィール削除）-->
                            <div class="modal fade" id="deleteProfile{{$my_profile->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <form method="post" action="{{ action('ChallengeProfileController@delete', ['id' => $my_profile->id]) }}">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete the image</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete?<br>
                                                <p>Company Name: {{$my_profile->public_name }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger" id="deletebtn">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                        @endforeach
                        <!--お悩み企業向けプロフィール追加登録ボタン-->
                        @if (count($challenge_profiles) > 0)
                        <div class="card text-center my-3">
                            <div class="card-body">
                                <p class="card-text">If you want to add a profile, click here.</p>
                                <a href="{{ url('/profile/challenge/create') }}" class="btn btn-success">Add a profile.</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--ソリューションプロフィールがある場合-->
    @if(count($solution_profiles) > 0)
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>マイページ</h2>
                <div class="user-profile card my-3">
                    <!--お悩み・ソリューション共通ユーザー情報-->
                    <div class="user-group col-md-10 mx-auto my-3">
                        <h4>ユーザー情報</h4>
                        <div class="user card my-2">
                            <table class="table table-striped">
                                <tr><td>ユーザー名</td><td>{{ $user->name }}</td></tr>
                                <tr><td>メールアドレス</td><td>{{ $user->email }}</td></tr>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href="{{ action('UserController@edit') }}" class="btn btn-primary pull-center">編集</a>
                        </div>
                    </div>
                </div><!--/user-profile-->
                <!--ソリューションプロフィール -->
                <div class="solution-profile card my-3">
                    <div class="profile-group col-md-10 mx-auto my-3">
                        <h4>プロフィール登録内容</h4>
                        @foreach ($solution_profiles as $my_profile)
                        <div class="solution-profile card my-2">
                            <table class="table table-striped">
                                <tr><td>会社名</td><td>{{ $my_profile->public_name }}</td></tr>
                                <tr><td>会社ロゴ</td>
                                @isset($my_profile->logo_image)
                                <td><img class="img-fluid" src="{{ $my_profile->logo_image }}" alt="ロゴ画像"></td>
                                @endisset
                                @empty($my_profile->logo_image)
                                <td><img class="img-fluid" src="{{ $no_image }}"></td>
                                @endempty
                                </tr>
                                <tr><td>地域</td><td>{{ $my_profile->area }}</td></tr>
                                <tr><td>住所</td><td>{{ $my_profile->address }}</td></tr>
                                <tr><td>電話番号</td><td>{{ $my_profile->phone_number }}</td></tr>
                                <tr><td>公式サイト</td><td>{{ $my_profile->url }}</td></tr>
                                <tr><td>ソリューションに関するキーワード</td><td>{!! nl2br($my_profile->solution_keyword) !!}</td></tr>
                                <tr><td>ソリューションの内容</td><td>{!! nl2br($my_profile->solution_detail) !!}</td></tr>
                                <tr><td>ソリューションの実績</td><td>{!! nl2br($my_profile->solution_performance) !!}</td></tr>
                                <tr><td>ソリューションに関する画像</td>
                                @isset($my_profile->solution_image)
                                <td><img class="img-fluid" src="{{ $my_profile->solution_image }}" alt="ソリューションに関する画像"></td>
                                @endisset
                                @empty($my_profile->solution_image)
                                <td><img class="img-fluid" src="{{ $no_image }}"></td>
                                @endempty</tr>
                                <tr><td>メッセージ</td><td>{!! nl2br($my_profile->message) !!}</td></tr>
                                <tr><td>担当者からのメッセージ</td><td>{!! nl2br($my_profile->contact_message) !!}</td></tr>
                                <tr><td>担当者に関する画像</td>
                                @isset($my_profile->contact_image)
                                <td><img class="img-fluid" src="{{ $my_profile->contact_image }}" alt="担当者に関する画像"></td>
                                @endisset
                                @empty($my_profile->contact_image)
                                <td><img class="img-fluid" src="{{ $no_image }}"></td>
                                @endempty</tr>
                                <tr><td>担当者のメールアドレス</td><td>{{ $my_profile->contact_email }}</td></tr>
                            </table>
                            <!--ソリューションプロフィール編集・削除ボタン-->
                            <div class="text-center my-2 px-2">
                                <a href="{{ action('SolutionProfileController@edit', ['id' => $my_profile->id]) }}" class="btn btn-primary">編集</a>
                                <!--モーダルを開く-->
                                <button type="button" class="btn btn-danger" id="delete-solution" data-toggle="modal" data-target="#deleteProfile{{$my_profile->id}}">削除</button>
                            </div>
                            <!--モーダル（ソリューションプロフィール削除）-->
                            <div class="modal fade" id="deleteProfile{{$my_profile->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <form method="post" action="{{ action('SolutionProfileController@delete', ['id' => $my_profile->id]) }}">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">プロフィールの削除</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                このプロフィールを本当に削除しますか。<br>
                                                <p>会社名: {{$my_profile->public_name }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                                <button type="submit" class="btn btn-danger" id="deletebtn">削除</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!--ソリューション企業向けプロフィールの追加登録ボタン-->
                        @if (count($solution_profiles) > 0)
                        <div class="card text-center my-3">
                            <div class="card-body">
                                <p class="card-text">プロフィールを追加したい場合はこちらから作成できます。</p>
                                <a href="{{ url('/profile/solution/create') }}" class="btn btn-success">プロフィールの追加登録</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!--プロフィール情報がなかった場合 -->
    @if($challenge_profiles == $solution_profiles)
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>マイページ (My Acoount)</h2>
                <div class="user-profile card my-3">
                    <!--お悩み・ソリューション共通ユーザー情報-->
                    <div class="user-group col-md-10 mx-auto my-3">
                        <h4>ユーザー情報 (User Profile)</h4>
                        <div class="user card my-2">
                            <table class="table table-striped">
                                <tr><td>ユーザー名 (Name)</td><td>{{ $user->name }}</td></tr>
                                <tr><td>メールアドレス (Email)</td><td>{{ $user->email }}</td></tr>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href="{{ action('UserController@edit') }}" class="btn btn-primary pull-center">編集 (Edit)</a>
                        </div>
                    </div>
                </div><!--/user-profile-->
                <div class="card text-center my-3">
                    <div class="card-body">
                        <p class="card-text">
                            引き続きプロフィール情報の登録をお願いします。<br>
                            Please continue and complete your profile.
                        </p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            製品をソリューションとして発信したい日本企業のみなさま<br>
                            For Japanese companies to share your products as solutions.
                        </p>
                        <a href="{{ url('/profile/solution/create') }}" class="btn btn-primary">こちらから (Click Here)</a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            お悩みを解決したい海外企業のみなさま<br>
                            For foreign companies and governments to search solutions for your challenges.
                        </p>
                        <a href="{{ url('/profile/challenge/create') }}" class="btn btn-primary">こちらから (Click Here)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
