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

    public function searchMobileFromHomePage(Request $request) {

    	$search = $request->input('search');    	  	    	   
        
    	$query = Mobile::query()
				   ->where('brand', 'LIKE', $search) 						                                                   
                   ->orWhere('type', 'LIKE', $search)                                                                           
				   ->get();				   
                                   
		return view('search-result', compact('query'));
    }
}
