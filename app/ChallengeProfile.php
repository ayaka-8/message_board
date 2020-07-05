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
        'public_name' => 'required|max:255',
        'logo_image' => 'nullable|file|image|mimes:png,jpg,jpeg|dimensions:max_width=250,max_height=250',
        'area' => 'required|max:255',
        'address' => 'required|max:255',
        'phone_number' => 'required|numeric|digits_between:8,11',
        'url' => 'url|nullable|max:255',
        'challenge_keyword' => 'required|max:255',
        'challenge_detail' => 'required|max:255',
        'challenge_method' => 'required|max:255',
        'challenge_image' => 'nullable|file|image|mimes:png,jpg,jpeg|dimensions:max_width=250,max_height=250',
        'message' => 'required|max:255',
        'contact_image' => 'nullable|file|image|mimes:png,jpg,jpeg|dimensions:max_width=250,max_height=250',
        'contact_message' => 'required|max:255',
        'contact_email' => 'required|email|max:255',
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
