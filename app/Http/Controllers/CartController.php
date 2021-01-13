<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use Session;

class CartController extends Controller
{

	public function index() {

        $cart = Session::get('cart'); 
        
        return view('cart', compact('cart'));	
	}
    

    public function addToCart($id) {
  
    	$mobile = Mobile::findOrFail($id);  
    	$cart = Session::get('cart');
        $flag = true;

    	if($cart == null) {    		
            
    		session()->put('cart', []);    		    		
    	} 

        $item = [
            'id' => $mobile->id,
            'brand' => $mobile->brand,
            'type' => $mobile->type,
            'color' => $mobile->color,
            'weight' => $mobile->weight,
            'screen_size' => $mobile->screen_size,
            'quantity' => 1
        ];

        // Check the item exist in the cart        
        foreach(Session::get('cart') as $key => $data) {
            if(Session::get('cart')[$key]['id'] == $item['id']) {
                $flag = false;
            } 
        }        

        if($flag) {

            session()->push('cart', $item);
            return redirect()->back()->with('cartSuccess', 'Successfully added in the cart!');

        } else {

            return redirect()->back()->with('cartError', 'This item already exist in the cart!');
        }
         
    }


    public function removeItem(Request $request) {

        $index = $request->index;              
        $request->session()->forget('cart.'.$index);

        return redirect()->back();
    }

    public function quantityAdd(Request $request) {

        // array index
        $index = $request->key; 

        // item data in the cart
        $id = Session::get('cart')[$index]['id'];
        $brand = Session::get('cart')[$index]['brand'];
        $type = Session::get('cart')[$index]['type'];
        $color = Session::get('cart')[$index]['color'];
        $weight = Session::get('cart')[$index]['weight'];
        $screen_size = Session::get('cart')[$index]['screen_size'];
        $quantity = Session::get('cart')[$index]['quantity'];    

        $item = [            
            'id' => $id,
            'brand' => $brand,
            'type' => $type,
            'color' => $color,
            'weight' => $weight,
            'screen_size' => $screen_size,
            'quantity' => $quantity+1
        ];         
                
        session()->put('cart.'.$index, $item);                   
        
        return redirect()->back();
    }
}
