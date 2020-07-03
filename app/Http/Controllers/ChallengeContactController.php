<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\ChallengeContact;
use App\Mail\Contact;
use App\ChallengeProfile;


class ChallengeContactController extends Controller
{
    /**
     * お悩み企業宛てお問い合わせ内容の入力、確認、送信機能
     */
    //お問い合わせ内容入力
    public function input(Request $request)
    {
        //お問い合わせ項目の内容を$subjectsに代入
        $subjects = ChallengeContact::$subjects;
        //問い合わせしたい企業のプロフィールidを取得
        $challenge_id = $request->id;
        //問い合わせしたい企業のpublic_nameを取得
        $recipient_name = ChallengeProfile::find($request->id)->public_name;
        //ログインユーザーのidを取得
        $user_id = Auth::id();
        
        return view('contact.challenge.input', ['subjects' => $subjects, 'challenge_id' => $challenge_id, 'recipient_name' => $recipient_name, 'user_id' => $user_id]);
    }
    
    //お問い合わせ内容確認
    public function confirm(Request $request)
    {
        //validation
        $this->validate($request, ChallengeContact::$rules);
        //（戻るボタンが押された時の為に)入力された内容を保存
        $contact_form = new ChallengeContact($request->all());
        unset($contact_form['_token']);
        
        return view('contact.challenge.confirm', ['contact' => $contact_form]);
    }
    
    //入力内容のデータ保存及びメールの送信->お問い合わせ完了画面
    public function complete(Request $request)
    {
        //入力内容の取得
        $contact_form = $request->except('action');
        //戻るボタンが押された場合
        if($request->action === 'back') {
            //問い合わせしたい企業のプロフィールidを取得し、パラメーターとして渡す
            $profile_id = $request->challenge_id;
            return redirect()->action('ChallengeContactController@input', ['id' => $profile_id])->withInput($contact_form);
        }
        //データを保存
        ChallengeContact::create($request->except('action'));
        //二重送信防止
        $request->session()->regenerateToken();
        //メール送信
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
