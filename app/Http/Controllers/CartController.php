<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use Session;

class CartController extends Controller
{
    

    public function addToCart($id) {
  
    	$mobile = Mobile::findOrFail($id);  

    	$cart = Session::get('cart');

    	if($cart == null) {

    		$counter = 0;

    		session()->put('cart', []);    		

    		session()->push('cart', $mobile->id);    	

    		$counter++;	


    	} else {

			session()->push('cart', $mobile->id);

			$counter = count($cart);

			$counter++;	

    	}           	    

    	session()->put('number', $counter);


    	return redirect()->back();    	
    }

    // next function
}
