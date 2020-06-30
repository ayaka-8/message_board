<!-- お悩み企業向けプロフィール新規登録画面 -->
@extends('layouts.common')
@section('title', 'Regisration Form')
@section('content')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>Regisration Form<br>（for Foreign Corporate and Local Government）</h2>
                <form action="{{ action('ChallengeProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            There are some errors, please correct them below.
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-3">Company Name <br>(Public Name)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="public_name" value="{{ old('public_name') }}" placeholder="e.g. Sample 50 Corporation.">
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Area</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="area" value="{{ old('area') }}" placeholder="e.g. Asia">
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
                            <textarea class="form-control" name="address" rows="3" placeholder="e.g. 123 South St, XYZ city...">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                            <div class="text-danger">
                                {{$errors->first('address')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Phone<br>(Please put only numbers.)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="e.g. 000000000">
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
                            <input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="e.g. https://...">
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
                            <textarea class="form-control" name="challenge_keyword" row="3" placeholder="e.g. generate elelctricity, solar...">{{ old('challenge_keyword') }}</textarea>
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
                            <textarea class="form-control" name="challenge_detail" row="10" placeholder="e.g. We have load-shedding everyday...">{{ old('challenge_detail') }}</textarea>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Expected Solution</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_method" row="10" placeholder="e.g. If we find some good machines to generate electricity...">{{ old('challenge_method') }}</textarea>
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
                            <textarea class="form-control" name="message" row="10" placeholder="e.g.  business scale, budget... ">{{ old('message') }}</textarea>
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
                            <textarea class="form-control" name="contact_message" row="10">{{ old('contact_message') }}</textarea>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Email of the Contact</label>
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
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
