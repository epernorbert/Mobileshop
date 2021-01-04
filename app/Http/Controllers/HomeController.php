<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
	public function index() {
		
		$mobile = Mobile::all()->sortByDesc('id');

		return view('home', compact('mobile'));
	}

}
