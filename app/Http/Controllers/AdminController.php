<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobile;
use App\Models\User;

class AdminController extends Controller
{	

    // load the page
    public function index() {

    	$mobile = Mobile::all();
    	$user = User::all();

    	return view ('admin', compact('mobile', 'user'));
    }    

}
