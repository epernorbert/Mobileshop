<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
