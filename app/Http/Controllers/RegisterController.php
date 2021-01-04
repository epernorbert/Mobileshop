<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {

    	return view('register');
    }

    public function register (CreateUser $request) {

    	$user = new User;

    	$user->fname = $request->firstname;
    	$user->lname = $request->lastname;
    	$user->uname = $request->username;
    	$user->email = $request->email;    	
    	$user->password = Hash::make($request->password);

    	$user->save();

    	return redirect()->back()->with('success', 'Success registration!');
    }
}
