<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionProfile extends Model
{
    protected $guarded = array('id');
    
    /**
     * ソリューションプロフィールのバリデーション
     */
    public static $rules = array(
        'public_name' => 'required',
        'logo_image' => 'nullable|file|image|mimes:png,jpg|dimensions:max_width=400,max_height=400',
        'area' => 'required',
        'address' => 'required',
        'phone_number' => 'required|numeric|digits_between:8,11',
        'url' => 'url|nullable',
        'solution_keyword' => 'required',
        'solution_detail' => 'required',
        'solution_performance' => 'required',
        'solution_image' => 'nullable|file|image|mimes:png,jpg|dimensions:max_width=400,max_height=400',
        'message' => 'required',
        'contact_image' => 'nullable|file|image|mimes:png,jpg|dimensions:max_width=400,max_height=400',
        'contact_message' => 'required',
        'contact_email' => 'required|email',
        );
        
    /**
     * usrsテーブルとリレーション
     */ 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * solution_contactsテーブルとリレーション
     */ 
    public function solutionContact()
    {
        return $this->hasMany('App\SolutionContact');
    }
}
