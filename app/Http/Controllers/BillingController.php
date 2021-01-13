<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function index() {                

    	$cart = Session::get('cart');        
    	
    	if($cart == null || $cart == []) {

    		return redirect()->back();

    	} else {

            $billingData = DB::table('billings')                                                        
                                ->where('user_id', '=', Auth::user()->id)                                
                                ->get();

            if(count($billingData) == 0){

                return view('billing');

            } else {

                return view('billing', compact('billingData'));    
            }                               		
    	}    	
    }

    public function saveBillingData(Request $request) {

    	$billing = new Billing;

    	$billing->user_id = Auth::user()->id;
    	$billing->city = $request->city;
    	$billing->post_code = $request->post_code;
    	$billing->street = $request->street;
    	$billing->house_number = $request->house_number;
    	$billing->mobile_number = $request->mobile_number;

    	$billing->save();

    	return redirect()->route('order.page');
    }


    public function updateBillingData(Request $request) {                

        $data = Billing::findOrFail($request->id);

        $data->user_id = Auth::user()->id;
        $data->city = $request->city;
        $data->post_code = $request->post_code;
        $data->street = $request->street;
        $data->house_number = $request->house_number;
        $data->mobile_number = $request->mobile_number;

        $data->save();

        return redirect()->route('order.page');
    }
}
