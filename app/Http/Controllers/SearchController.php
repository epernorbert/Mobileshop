<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Mobile;

class SearchController extends Controller
{
    public function index() {

    	return view('search');
    }

    public function searchMobile(Request $request) {

    	$brand = $request->input('brand');
    	$type = $request->input('type');
    	$color = $request->input('color');
    	// if min weight input empty then query value 0 else input value
    	$weight_from = ($request->input('weight_from') == '' ? 0 : $request->input('weight_from')); 
    	// if max weight input empty then query value max input when admin upload mobile which is 300
    	$weight_to = ($request->input('weight_to') == '' ? 300 : $request->input('weight_to'));         	
    	// if min screen size input empty then query value 0 else input value
    	$screen_size_from = ($request->input('screen_size_from') == '' ? 0 : $request->input('screen_size_from'));    	
    	// if max screen size input empty then query value max input when admin upload mobile which is 8    
    	$screen_size_to = ($request->input('screen_size_to') == '' ? 8 : $request->input('screen_size_to'));    	    

    	$query = Mobile::query()
				   ->where('brand', 'LIKE', $brand) 		
				   ->where('type', 'LIKE', $type)   
				   ->where('color', 'LIKE', $color)   
				   ->whereBetween('weight', [$weight_from, $weight_to])   
				   ->whereBetween('screen_size', [$screen_size_from, $screen_size_to])   
				   ->get();				   

		return view('search-result', compact('query'));
    }
}
