<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
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

    public function login(Request $request) {
        $input = $request->all();

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)) {
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
            return redirect()->route('login')
                            ->with('error', 'Email and Password are wrong');   
        }
        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();
        
        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearerrrr',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);
        // return redirect()->route('superadmin.home');    
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'superadmin') {
                return redirect()->route('superadmin.home');
            } else if (auth()->user()->role == 'admin'){
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->route('login')
                            ->with('error', 'Email and Password are wrong');
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
        }
    }

    public function logout(Request $request) {
        // $request->user()->token()->delete();
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        Auth::logout(); // logout user
        return redirect(\URL::previous());
    }
}
