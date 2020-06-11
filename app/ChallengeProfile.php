<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeProfile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'public_name' => 'required',
        'area' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'url' => 'required',
        'challenge_keyword' => 'required',
        'challenge_detail' => 'required',
        'challenge_method' => 'required',
        'message' => 'required',
        'contact_message' => 'required',
        'contact_email' => 'required',
        );
}
