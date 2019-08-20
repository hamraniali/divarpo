<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function signin(Request $request)
    {
        $this->validate($request , [
           'password' => 'required',
           'phone' => 'required'
        ]);
        $password = $request->input('password');
        $user = User::where('phone' ,'=' ,$request->input('phone'))->first();
        if (Hash::check($password , $user->password)) {
            if ($user->active == 1) {
                Auth::loginUsingId($user->id);
                return redirect('/');
            }
            else {
                Auth::loginUsingId($user->id);
                return redirect(route('verification' , ['id' => $user->id]));
            }
        }
        else{
            return redirect(route('login'))->with(['status' => 'error' , 'message' => 'شماره تلفن یا رمز عبور اشتباه است']);
        }
    }
}
