<!-- お悩み企業向けプロフィール編集画面　-->
@extends('layouts.common')
@section('title', 'Edit Profile')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>Edit Profile Form</h2>
                <form action="{{ action('ChallengeProfileController@update', ['id' => $my_profile->id]) }}" method="post" enctype="multipart/form-data">
                    <!-- エラーメッセージ の表示 -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            There are some errors, please correct them below.
                        </div>
                    @endif
                    <!--　エラーがあれば編集中の内容を表示（全項目）　-->
                    <div class="form-group row">
                        <label class="col-md-3" >Company Name<br>(Public Name)</label>
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
                        <label class="col-md-3">Company Logo</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="logo_image">
                            @if ($errors->has('logo_image'))
                            <div class="text-danger">
                                {{$errors->first('logo_image')}}
                            </div>
                            @endif
                            <div class="form-text text-info">
                                @isset($my_profile->logo_image)
                                Setting: <img src="{{ old('logo_image', $my_profile->logo_image) }}" alt="Company Logo">
                                @endisset
                                @empty($my_profile->logo_image)
                                <p>There is no image set.</p>
                                @endempty
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">Delete the image.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Area</label>
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
                        <label class="col-md-3">Address</label>
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
                        <label class="col-md-3">Phone</label>
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
                        <label class="col-md-3">Official Website</label>
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
                        <label class="col-md-3">Keywords for Your Challenges</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_keyword" row="3">{{ old('challenge_keyword', $my_profile->challenge_keyword) }}</textarea>
                            @if ($errors->has('challenge_keyword'))
                            <div class="text-danger">
                                {{$errors->first('challenge_keyword')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Current Situations and Challenges</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_detail" row="10">{{ old('challenge_detail', $my_profile->challenge_detail) }}</textarea>
                            @if ($errors->has('challenge_detail'))
                            <div class="text-danger">
                                {{$errors->first('challenge_detail')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Image for Your Current Challenge</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="challenge_image">
                            @if ($errors->has('challenge_image'))
                            <div class="text-danger">
                                {{$errors->first('challenge_image')}}
                            </div>
                            @endif
                            <div class="form-text text-info">
                                @isset($my_profile->challenge_image)
                                Setting: <img src="{{ old('challenge_image', $my_profile->challenge_image) }}" alt="Image for Your Current Challenge">
                                @endisset
                                @empty($my_profile->challenge_image)
                                <p>There is no image set.</p>
                                @endempty
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">Delete the image.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Expected Solution</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_method" row="10">{{ old('challenge_method', $my_profile->challenge_method) }}</textarea>
                            @if ($errors->has('challenge_method'))
                            <div class="text-danger">
                                {{$errors->first('challenge_method')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Message</label>
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
                        <label class="col-md-3">Message from the Contact</label>
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
                        <label class="col-md-3">Image for the Contact</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="contact_image">
                            @if ($errors->has('contact_image'))
                            <div class="text-danger">
                                {{$errors->first('contact_image')}}
                            </div>
                            @endif
                            <div class="form-text text-info">
                                @isset($my_profile->contact_image)
                                Setting: <img src="{{ old('contact_image', $my_profile->contact_image) }}" alt="Image for the Contact">
                                @endisset
                                @empty($my_profile->contact_image)
                                <p>There is no image set.</p>
                                @endempty
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">Delete the image.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Email of the Contact</label>
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
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
