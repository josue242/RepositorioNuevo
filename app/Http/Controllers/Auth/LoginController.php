<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\where;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credential = $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
           
        ]);

        $credentials = [

            'email' => $credential['email'],
            'password' => $credential ['password'],
        ];
        if (Auth::attempt($credentials )) {
            // Authentication was successful...
            $request->session()->regenerate();
            return redirect()->intended('busqueda');
        }
            //return back()->withErrors([$this->username()=>'Datos incorrectos']);
            return redirect("login")->withErrors(['msgError'=>'Credenciales no validas']);
    
        
    }

   public function logout(Request $request){
    
    session::flush();
    Auth::logout();

    return redirect('login');
   }
  
}
