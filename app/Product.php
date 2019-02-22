<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'stock_quantity', 'description', 'image'];

    // public static $rules = [
    // 	'name' => 'required|min:4',
    // 	'price' => 'required|min:2',
    // 	'stock_quantity' => 'required',
    // 	'description' => 'required|min:10',
    // 	'imge' => 'required|mimes:jpeg,bmp,png'
    // ];
    
    public function orders() {
    	return $this->belongsToMany('App\Order', 'product_order', 'product_id', 'order_id')->withPivot('price','quantity','sub_total');
    }
}
