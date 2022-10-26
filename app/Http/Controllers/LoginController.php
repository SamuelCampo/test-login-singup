<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use Hash;
use App\Models\User;
use App\Models\Verification;
use Mail;

class LoginController extends Controller
{
    function validateSession(Request $request){
		$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
			return redirect('/confirmacion_login');
        }
		Session::flash('status', 'Las credenciales enviadas son incorrectas');
		return redirect('/');
	}

	function twoFactorAuthentication(Request $request,$token,$email){
		$validator = Validator::make([
			'token' => $token,
			'email' => $email
		],[
			'token' => ['required', 'min:6' , 'max:6'],
			'email' => ['required', 'email']
		]);

		if($validator->fails()) {
			Session::flash('status', 'El link se encuentra roto');
			return redirect('/');
		}

		$user = User::where('remember_token',$token)
					->where('email',$email)
					->first();
		if(is_object($user)){
			$user->email_verified_at = date('Y-m-d H:i:s');
			$user->remember_token = '';
			$user->update();
		}

		return redirect('/confirmacion_login');
	}

	public function confirmationCode()
	{
		$subject = "Codigo de seguridad";
        $for = auth()->user()->email;

		$code = rand(100000,999999);

		Verification::create([
			'key_user' => auth()->user()->id,
			'code_verification' => $code,
		]);

        Mail::send('template_email.email_code',array('token' => $code), function($msj) use($subject,$for){
            $msj->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            $msj->subject($subject);
            $msj->to($for);
        });

		return view('pages.two_confirmation');
	}

	public function checkStatusCode(Request $request)
	{
		$credentials = $request->validate([
            'code' => ['required', 'min:6' , 'max:6'],
        ]);

		$date = new \DateTime();
		$date->modify('+30 minutes');

		$response_code = Verification::where('key_user',auth()->user()->id)
									->where('code_verification',$request->input('code'))
									->where('created_at','<',$date->format('Y-m-d H:i:s'))
									->orderBy('created_at','DESC')
									->first();

		if(is_object($response_code)){
			return redirect('/panel');
		}
		Session::flash('status', 'El codigo ingresado es incorrecto');
		return redirect('/');
	}

	public function singup(Request $request)
	{
		$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
			'name' => ['required']
        ]);

		$user = User::where('email', $request->input('email'))->first();

		if(is_object($user)){
			return redirect('/singup')->with('status', 'The sent email has already been registered');
		}

		$user = (object)$request->input();
		$code = rand(100000,999999);
		$response = User::create([
			'name' => $user->name,
			'email' => $user->email,
			'password' => Hash::make($user->password),
			'remember_token' => $code
		]);

		$subject = "Confirmación de email";
        $for = $user->email;

        Mail::send('template_email.email_verify',array('body' => $user,'token' => $code), function($msj) use($subject,$for){
            $msj->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            $msj->subject($subject);
            $msj->to($for);
        });

		if (Auth::attempt($credentials)) {
			return redirect('/confirmacion_login');
        }
	}
}
