<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function create() {
    	$cartitems=Cart::content();
    	
    	// $userCollection = collect(User::get());
    	// dd($userCollection);

    	// $username = $userCollection->pluck('id');
    	$id = \Auth::user()->id;
    	// dd($id);
    	$order = new Order;
    	$order->total_quantity = Cart::count();
    	$order->total_amount = Cart::total();
    	$order->order_date = date("Y-m-d");
    	$order->user_id = $id;
    	$order->save();

    	foreach ($cartitems as $cartitem) {
    		$product = Product::find($cartitem->id);
			$order->products()->attach($product->id,
				['price'=>$cartitem->price, 'quantity'=>$cartitem->qty, 'sub_total'=>$cartitem->total]);
			// dd($orderdetail);
    	}
    	Cart::destroy();
    	return redirect('products')->with('message', 'Order Success');
    }
}
