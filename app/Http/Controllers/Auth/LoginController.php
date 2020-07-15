<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        
    // // User role
    //     $role = $request->user()->name;
        
    //     // Check user role
    //     switch ($role) {
    //         case 'Account':
    //                 return '/accounts_dashboard';
    //             break;
    //         case 'abdul hadi':
    //                 return '/deans_dashboard';
    //             break; 
    //         case 'Bursary Officer':
    //                 return '/bursary_dashboard';
    //             break; 
    //         default:
    //                 return '/login'; 
    //             break;
    //     }
        if(Auth::user()->role=='1'){
    
            return '/account_dashboard';
        }
        if(Auth::user()->role=='2'){
    
            return '/dean_dashboard';
        }
        if(Auth::user()->role=='3'){
    
            return '/bursary_dashboard';
        }
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
}
