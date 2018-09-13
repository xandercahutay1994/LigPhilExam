<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

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
    protected $redirectTo = '/adminLists';

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
    * Create a new controller instance.
    *
    * @return void
    */
    public function login(Request $request){

        return redirect('/adminLists');
        // if(Auth::attempt(['id' => $request->user_id, 'password' => $request->password])){
        //     return redirect('/adminLists');    
        // }else{
        //     return redirect('/login')->with('error','Error');
        // }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/adminLists');
        
        // return redirect('/login');
    }
}
