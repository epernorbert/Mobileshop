<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Billing;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    

    public function delete_user($id) {

    	$user = User::find($id);   	
    	$user->delete();

    	return redirect()->back()->with('success_delete_user', 'Delete was successful!');
    }


    public function read_user($id) {

    	$user = User::find($id);

    	return view('edit_user', compact('user'));
    }


    public function update_user(Request $request) {

		 $data = User::findOrFail($request->id);
		 $data->admin = $request->user_type;
		 $data->save();

		 return back()->with('success_update', 'The information was updated successfully');
    }


    public function checkProfile() {        

        $billingData = DB::table('billings')
                            ->where('user_id', '=', Auth::user()->id)
                            ->get();   
        
        $orders = DB::table('orders as o')
                            ->join('users as u', 'o.user_id', '=', 'u.id')
                            ->join('mobiles as m', 'o.product_id', '=', 'm.id')  
                            ->select('m.brand', 'm.type', 'o.quantity', 'o.created_at', 'o.id')    
                            ->where('u.id', '=', Auth::user()->id)                      
                            ->get();                                                 

        return view('profile', compact('billingData', 'orders'));
    }

    // next function
}

