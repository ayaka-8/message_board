<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\SolutionProfile;
use App\User;
use Carbon\Carbon;

class SolutionProfileController extends Controller
{
    /**
    *ソリューション企業向けプロフィール登録、編集機能
    */
    //プロフィール新規登録入力
    public function add()
    {
        return view('profile.solution.create');
    }
    /**
     *プロフィール登録
    */
    //プロフィールの登録->マイページへ
    public function create(Request $request)
    {
        //Validation
        $this->validate($request, SolutionProfile::$rules);
        $solution_profile = new SolutionProfile;
        $form = $request->all();
        //画像を保存
        //ロゴ画像
        if (isset($form['logo_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('logo_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('solution_logo_images',$request->file('logo_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $solution_profile->logo_image = Storage::disk('s3')->url($path);
            unset($form['logo_image']);
        } else {
            $solution_profile->logo_image = null;
        }
        //ソリューションに関する画像
        if (isset($form['solution_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('solution_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('solution_images',$request->file('solution_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $solution_profile->solution_image = Storage::disk('s3')->url($path);
            unset($form['solution_image']);
        } else {
            $solution_profile->solution_image = null;
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
            $path = Storage::disk('s3')->putFileAs('solution_contact_images',$request->file('contact_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $solution_profile->contact_image = Storage::disk('s3')->url($path);
            unset($form['contact_image']);
        } else {
            $solution_profile->contact_image = null;
        }
        // _tokenを削除
        unset($form['_token']);
        //ログインユーザーのidを取得
        $solution_profile->user_id = Auth::id();
        //データベースに保存
        $solution_profile->fill($form);
        $solution_profile->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'プロフィールを登録しました');
    }
    
    /**
    *プロフィールの編集
    */ 
    public function edit(Request $request)
    {
        //プロフィールの取得
        $my_profile = SolutionProfile::find($request->id);
        return view('profile.solution.edit', ['my_profile' => $my_profile]);
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
        $this->validate($request, SolutionProfile::$rules);
        //プロフィールの取得
        $my_profile = SolutionProfile::find($request->id);
        $form = $request->all();
        //画像の保存
        //ロゴ画像の更新
        if (isset($form['logo_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('logo_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('solution_logo_images',$request->file('logo_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $my_profile->logo_image = Storage::disk('s3')->url($path);
            unset($form['logo_image']);
        } elseif(isset($request->remove)) {
            $my_profile->logo_image = null;
            //削除する画像の取得
            $del_image = $request->logo_image;
            //s3から画像を削除
            Storage::disk('s3')->delete($del_image);
            unset($form['remove']);
        }
        //ソリューションに関する画像の更新
        if (isset($form['solution_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $name = $request->file('solution_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$name;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('solution_images',$request->file('solution_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $my_profile->solution_image = Storage::disk('s3')->url($path);
            unset($form['solution_image']);
        } elseif(isset($request->remove)) {
            $my_profile->solution_image = null;
            //削除する画像の取得
            $del_image = $request->solution_image;
            //s3から画像を削除
            Storage::disk('s3')->delete($del_image);
            unset($form['remove']);
        }
        //担当者に関する画像の更新
        if (isset($form['contact_image'])) {
            //アップロード日時を取得 
            $time = Carbon::now()->format('Y_m_d_h_i_s');
            //画像ファイル名を取得
            $filename = $request->file('contact_image')->getClientOriginalName(); 
            //ファイル名を指定
            $filename = $time.'_'.$filename;
            //ファイル名を指定してs3へ保存
            $path = Storage::disk('s3')->putFileAs('solution_contact_images',$request->file('contact_image'), $filename, 'public');
            //s3へのパスをカラムに保存
            $my_profile->contact_image = Storage::disk('s3')->url($path);
            unset($form['contact_image']);
        } elseif(isset($request->remove)) {
            $my_profile->contact_image = null;
            //削除する画像の取得
            $del_image = $request->contact_image;
            //s3から画像を削除
            Storage::disk('s3')->delete($del_image);
            unset($form['remove']);
        }
        unset($form['_token']);
        // 該当するデータを上書きして保存する
        $my_profile->fill($form)->save();
        //マイページへ
        return redirect()->route('mypage')->with('status', 'プロフィール情報を更新しました');
    } 
    
    /**
     * プロフィールの削除->マイページ
     */
    public function delete(Request $request)
    {
        //該当するプロフィールの取得
        $my_profile = SolutionProfile::find($request->id);
        //削除
        $my_profile->delete();
        
        return redirect()->route('mypage')->with('status', 'プロフィール情報を削除しました');
    }

}
