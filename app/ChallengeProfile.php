<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeProfile extends Model
{
    protected $guarded = array('id');
    
    /**
     * お悩みプロフィールのバリデーション
     */
    public static $rules = array(
        'public_name' => 'required',
        'logo_image' => 'nullable|file|image|mimes:png,jpg|dimensions:max_width=400,max_height=400',
        'area' => 'required',
        'address' => 'required',
        'phone_number' => 'required|numeric|digits_between:8,11',
        'url' => 'url|nullable',
        'challenge_keyword' => 'required',
        'challenge_detail' => 'required',
        'challenge_method' => 'required',
        'challenge_image' => 'nullable|file|image|mimes:png,jpg|dimensions:max_width=400,max_height=400',
        'message' => 'required',
        'contact_image' => 'nullable|file|image|mimes:png,jpg|dimensions:max_width=400,max_height=400',
        'contact_message' => 'required',
        'contact_email' => 'required|email',
        );
        
    /**
     * usersテーブルとリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * challenge_contactsテーブルとリレーション
     */
    public function challengeContact()
    {
        return $this->hasMany('App\ChallengeContact');
    }
}
