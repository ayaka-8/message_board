<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\ChallengeProfile;
use App\User;
use Session;
use Carbon\Carbon;

class ChallengeProfileController extends Controller
{
    /**
    *お悩み企業向けプロフィール登録、編集機能
    */
    //プロフィール新規登録入力
    public function add()
    {
        return view('profile.challenge.create');
    }
    /**
     *プロフィール登録
    */
    //プロフィールの登録->マイページへ
    public function create(Request $request)
    {
        //validation
        $this->validate($request, ChallengeProfile::$rules);
        $challenge_profile = new ChallengeProfile;
        $form = $request->all();
        //画像の保存
        //ロゴ画像
        if (isset($form['logo_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('logo_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('challenge_logo_images',$request->file('logo_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $challenge_profile->logo_image = Storage::disk('s3')->url($path);
            unset($form['logo_image']);
        } else {
            $challenge_profile->logo_image = null;
        }
        
        //お悩みに関する画像
        if (isset($form['challenge_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('challenge_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('challenge_images',$request->file('challenge_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $challenge_profile->challenge_image = Storage::disk('s3')->url($path);
            unset($form['challenge_image']);
        } else {
            $challenge_profile->challenge_image = null;
        }
        
        //担当者に関する画像
        if (isset($form['contact_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('contact_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('challenge_contact_images',$request->file('contact_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $challenge_profile->contact_image = Storage::disk('s3')->url($path);
            unset($form['contact_image']);
        } else {
            $challenge_profile->contact_image = null;
        }
        // _tokenを削除
        unset($form['_token']);
        // imageを削除
        unset($form['image']);
        //ログインユーザーのidを取得
        $challenge_profile->user_id = Auth::id();
        //データベース に保存
        $challenge_profile->fill($form);
        $challenge_profile->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'Your profile has been registered.');
    }
    
    /**
    *プロフィールの編集
    */
    public function edit(Request $request)
    {
        //プロフィールの取得
        $my_profile = ChallengeProfile::find($request->id);
        return view('profile.challenge.edit', ['my_profile' => $my_profile]);
    }
    
    /**
     * プロフィールの更新->マイページ
     */
    public function update(Request $request)
    {
        /**
        *バリデーションを実行し、エラーがなければデータを更新してマイページへ戻る
        */
        //validation
        $this->validate($request, ChallengeProfile::$rules);
        //プロフィールの取得
        $my_profile = ChallengeProfile::find($request->id);
        //編集内容の取得
        $form = $request->all();
        //画像の保存
        //ロゴ画像が更新されていた場合
        if (isset($form['logo_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('logo_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('challenge_logo_images',$request->file('logo_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $my_profile->logo_image = Storage::disk('s3')->url($path);
            unset($form['logo_image']);
        } 
        
        //お悩みに関する画像が更新されていた場合
        if (isset($form['challenge_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('challenge_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('challenge_images',$request->file('challenge_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $my_profile->challenge_image = Storage::disk('s3')->url($path);
            unset($form['challenge_image']);
        } 
        
        //担当者に関する画像が更新されていた場合
        if (isset($form['contact_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $filename = $request->file('contact_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$filename;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('challenge_contact_images',$request->file('contact_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $my_profile->contact_image = Storage::disk('s3')->url($path);
            unset($form['contact_image']);
        } 
        
        //削除チェックボックスにチェックがあった場合
        if(isset($request->delete)) {
            //該当ファイルを探すため、全てのファイルを$deletefilesに代入
            $deletefiles = $form['delete'];
            //foreachでロゴ、ソリューション、担当者のどれに該当するかをチェック
            foreach($deletefiles as $dfile){
                //ロゴ画像と一致した場合
                if($dfile == $my_profile->logo_image) {
                    $my_profile->logo_image = null;
                    //s3から画像を削除
                    Storage::disk('s3')->delete($my_profile->logo_image);
                    unset($form['delete']);
                } elseif($dfile == $my_profile->challenge_image) {
                    //お悩み画像と一致した場合
                    $my_profile->challenge_image = null;
                    //s3から画像を削除
                    Storage::disk('s3')->delete($my_profile->challenge_image);
                    unset($form['delete']);
                } else {
                    //担当者の画像と一致した場合
                    $my_profile->contact_image = null;
                    //s3から画像を削除
                    Storage::disk('s3')->delete($my_profile->contact_image);
                    unset($form['delete']);
                }
            }
        }
        
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'Your profile has been updated.');
    }
    
    /**
     * プロフィールの削除->マイページ
     */
    public function delete(Request $request)
    {
        //該当するプロフィールの取得
        $my_profile = ChallengeProfile::find($request->id);
        //削除
        $my_profile->delete();
        
        return redirect()->route('mypage')->with('status', 'Your profile has been deleted.');
    }
}
