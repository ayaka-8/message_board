<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionProfile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'public_name' => 'required',
        'area' => 'required',
        'address' => 'required',
        'phone_number' => 'required|numeric|digits_between:8,11',
        'url' => 'required|url',
        'solution_keyword' => 'required',
        'solution_detail' => 'required',
        'solution_performance' => 'required',
        'message' => 'required',
        'contact_message' => 'required',
        'contact_email' => 'required|email',
        );
        
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
