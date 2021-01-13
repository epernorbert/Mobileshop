<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {

    	$cart = Session::get('cart');

    	if($cart == null || $cart == []) {

    		return redirect()->back();
    		
    	} else {

	    	$billingData = DB::table('billings')                                                        
	                            ->where('user_id', '=', Auth::user()->id)                                
	                            ->get();		    	

	    	return view('order', compact('cart', 'billingData'));
    	}
    }
}
