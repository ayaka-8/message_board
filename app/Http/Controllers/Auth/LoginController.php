<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //ログイン->マイページへ
    protected function authenticated() {
        
        return  redirect('mypage')->with('status', 'ログインしました。(You have successfully logged in.)');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * ログアウト処理
     */
    protected function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        //ログアウト->top画面へ
        return redirect('/')->with('status', 'ログアウトしました。(You have successfully logged out.)');
    }
}
