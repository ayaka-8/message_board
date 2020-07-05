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
        'public_name' => 'required|max:255',
        'logo_image' => 'nullable|file|image|mimes:png,jpg,jpeg|dimensions:max_width=250,max_height=250',
        'area' => 'required|max:255',
        'address' => 'required|max:255',
        'phone_number' => 'required|numeric|digits_between:8,11',
        'url' => 'url|nullable|max:255',
        'solution_keyword' => 'required|max:255',
        'solution_detail' => 'required|max:255',
        'solution_performance' => 'required|max:255',
        'solution_image' => 'nullable|file|image|mimes:png,jpg,jpeg|dimensions:max_width=250,max_height=250',
        'message' => 'required|max:255',
        'contact_image' => 'nullable|file|image|mimes:png,jpg,jpeg|dimensions:max_width=250,max_height=250',
        'contact_message' => 'required|max:255',
        'contact_email' => 'required|email|max:255',
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
