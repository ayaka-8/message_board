<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionContact extends Model
{
    protected $guarded =array('id');
    
    /**
     * お問合わせのバリデーション
     */
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'subject.*' =>'in:ソリューション内容について,その他',
        'content' => 'required'
        );
        
    /**
     * セレクトボックスに表示するお問合わせ項目
     */
    public static $subjects =[
        'ソリューションの内容について',
        'その他'
        ];
        
    /**
     * solution_profilesテーブルとリレーション
     */ 
    public function solutionProfile()
    {
        return $this->belongsTo('App\SolutionProfile');
    }
}   
