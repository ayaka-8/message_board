<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\SolutionContact;
use App\Mail\Contact;
use App\SolutionProfile;


class SolutionContactController extends Controller
{
    /**
     * ソリューション企業宛てお問い合わせ内容の入力、確認、送信機能
     */
    //お問い合わせ内容入力
    public function input(Request $request)
    {
        //お問い合わせ項目の内容を$subjectsに代入
        $subjects = SolutionContact::$subjects;
        //問い合わせしたい企業のidを取得
        $recipient = SolutionProfile::where('user_id', $request->id)->first();
        $recipient->id = $recipient->user_id;
        $recipient->name = $recipient->public_name;
        //ログインユーザーのidを取得
        $user_id = Auth::id();
        
        return view('contact.solution.input', ['subjects' => $subjects, 'recipient' => $recipient, 'user_id' => $user_id]);
    }
    
    //お問い合わせ内容確認
    public function confirm(Request $request)
    {
        $this->validate($request, SolutionContact::$rules);
        $contact_form = new SolutionContact($request->all());
        unset($contact_form['_token']);
        
        return view('contact.solution.confirm', ['contact' => $contact_form]);
    }
    
    public function complete(Request $request)
    {
        $contact_form = $request->except('action');
        //戻るボタンが押された場合
        if($request->action === 'back') {
            //問い合わせしたい企業のidを取得し、パラメーターとして渡す
            $recipient_id = $request->recipient_id;
            return redirect()->action('SolutionContactController@input', ['id' => $recipient_id])->withInput($contact_form);
        }
        //データを保存
        SolutionContact::create($request->except('action'));
        //二重送信防止
        $request->session()->regenerateToken();
        //TODO: mail
        //送信メール
        Mail::send(new Contact([
            'to' => $request->email,
            'to_name' => $request->name,
            'from' => 'from@example.com',
            'from_name' => '発見 世界のビジネスチャンス',
            'recipient_name' => $request->recipient_name,
            'subject' => 'お問い合わせありがとうございました',
            'title' => $request->subject,
            'content' => $request->content
            ]));
        
        return view('contact.solution.complete');
        
    }
}
