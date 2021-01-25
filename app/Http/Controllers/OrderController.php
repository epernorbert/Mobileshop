<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;

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

    public function OrderComplete(Request $request) {

        $cart = Session::get('cart');

        foreach($cart as $value) {

            $order = new Orders;      

            $order->user_id = Auth::user()->id;
            $order->product_id = $value['id'];
            $order->quantity = $value['quantity'];
            
            $order->save();            
        }

        Session::forget('cart');

        return redirect('profile')->with('successOrder', 'Congratulation, you have successfully ordered these product.');
    }
}
