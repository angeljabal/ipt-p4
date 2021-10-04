<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PDO;
use Nexmo\Laravel\Facade\Nexmo;

class AuthController extends Controller
{
    public function registrationForm(){
        if(auth()->check()){
            return redirect('/logs');
        }
        return view('register');
    }

    public function loginForm(){
        if(auth()->check()){
            return redirect('/logs');
        }
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            'lname'     =>  'required|string',
            'fname'     =>  'required|string',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|string|confirmed|min:6',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'lname'             =>  $request->lname,
            'fname'             =>  $request->fname,
            'email'             =>  $request->email,
            'password'          =>  bcrypt($request->password),
            'remember_token'    =>  $token,
        ]);

        Mail::send('verification-email', ['user'=>$user], function($mail) use ($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('klaredesteenm4@gmail.com', 'IPT Systems');
        });

        return redirect('/login')->with('Message', 'Your account has been created. Please check your email for verification');
    }

    public function login(Request $request){
        $request->validate([
            'email'     =>  'email|required',
            'password'  =>  'string|required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at==null){
            return redirect('/login')->with('Error', 'This account has not completed the registration process yet.');
        }
        
        $login = auth()->attempt([
            'email'     =>  $request->email,
            'password'  =>  $request->password
        ]);

        if(!$login){
            return back()->with('Error', 'Invalid Credentials');
        }

        return redirect('/logs');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('login')->with('Error', 'Invalid token. The attached token is invalid or has already been consumed.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('Message', 'Your account has been verified. You can login now.');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->flush();
        return redirect('/login')->with('Message', 'Logged out successfully');
    }
}
