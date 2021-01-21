<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Session;

class LoginController extends Controller
{
    
    // load the page
	public function index() {

		return view('login');
	}

	
	// user login
	public function sign_in(LoginUser $request){			

		// authentication function
		if(Auth::attempt([
			'uname' => $request->usernamee,
			'password' => $request->passwordd
		])){						
			if(Auth::user()->admin == false){
				return redirect()->intended( route ('home.page'));
			} else {
				return redirect()->intended( route ('admin.page'));
			}
			
		}
		

		return redirect()->back()->with('status', 'Username or password is incorrect!');
	}


	// user logout
	public function logout () {
    	Auth::logout();
    	// remove all the session data
    	Session::flush();
    	return redirect()->intended( route ('login.page'));;
    }	

}
