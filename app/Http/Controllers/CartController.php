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
            'quantity' => 1,           
            'price' => $mobile->price
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
        $quantity = Session::get('cart')[$index]['quantity'];    
        $price = Session::get('cart')[$index]['price'];            

        $item = [            
            'id' => $id,
            'brand' => $brand,
            'type' => $type,            
            'quantity' => $quantity+1,
            'price' => $price,            
        ];         
                
        session()->put('cart.'.$index, $item);                   
        
        return redirect()->back();
    }
}
