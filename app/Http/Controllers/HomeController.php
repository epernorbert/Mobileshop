<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Images;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
	public function index() {
		
        $item = DB::table('mobiles')
                        ->join('images', 'mobiles.id', '=', 'images.mobile_id')                             
                        ->groupBy('mobiles.id')
                        ->get();

		return view('home', compact('item'));
	}

}
