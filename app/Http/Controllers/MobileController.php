<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Comment;
use App\Models\Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadMobile;

class MobileController extends Controller
{

	public function index($id) {

		$mobile = Mobile::findOrFail($id); 
        
        // Dind a comment and who posted it
        $comment = DB::table('users')
                            ->join('comments', 'users.id', '=', 'comments.user_id')                            
                            ->select('comments.content', 'users.fname', 'users.lname')
                            ->where('comments.mobile_id', '=', $mobile->id)
                            ->get();        

        // Find a images which belongs specific mobile
        $image = DB::table('images')
                            ->where('mobile_id', $mobile->id)->get();

		return view('mobile', compact('mobile', 'image', 'comment'));
	}


    public function upload_mobile(UploadMobile $request) {
    	
    	$mobile = new Mobile;
        $images = new Images;    

        // Image validation
        foreach($request->file('image') as $image) {    
                        
            $request->validate([
                'image' => 'required',
                'image.*' => 'mimes:jpeg,jpg,png|max:2048'                
            ]);
        }         

        // Get data
    	$mobile->brand = $request->brand;
    	$mobile->type = $request->type;
    	$mobile->color = $request->color;
    	$mobile->weight = $request->weight;
    	$mobile->screen_size = $request->screen_size;  
    	$mobile->user_id = Auth::user()->id;          
    	$mobile->save();

        foreach($request->file('image') as $image) {                

            // stored storage/app/public/image folder with hashed name
            $image->store('public/image');
            // image path after store
            $path = $image->store('public/image');
            // explode path and find new hashed image name
            $extension = explode('/', $path);
            $filename = end($extension);                  
        
            // Store images in database
            Images::create([
                'name' => $filename, 
                'mobile_id' => Mobile::latest()->first()->id
            ]);
        }

    	return redirect()->back()->with('success', 'Mobile has been added succesfully!');
    }


    public function delete_mobile($id) {

        $mobile = Mobile::findOrFail($id);
        $mobile->delete();

        return redirect()->back()->with('success_delete', 'Delete was successful!');
    }


    public function edit_mobile($id) {

        $mobile = Mobile::findOrFail($id);
        // Find a comment which belongs specific mobile
        $comment = DB::table('comments')->where('mobile_id', $mobile->id)->get();

        return view('edit', compact('mobile', 'comment'));
    }


    public function update_mobile(Request $request){

        $data = Mobile::findOrFail($request->id);
        $data->brand = $request->brand;
        $data->type = $request->type;
        $data->color = $request->color;
        $data->weight = $request->weight;
        $data->screen_size = $request->screen_size;
        $data->save();

        return redirect('admin');
    }


    
}