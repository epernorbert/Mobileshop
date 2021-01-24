<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Mobile;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index() {

        $item = DB::table('mobiles')
                        ->join('images', 'mobiles.id', '=', 'images.mobile_id')  
                        ->orderBy('mobiles.id', 'desc')                           
                        ->groupBy('mobiles.id')  
                        ->paginate(8);

        //$item = DB::table('mobiles')->paginate(3);        

    	return view('search', compact('item'));
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
