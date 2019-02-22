<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['user_id', 'total_quantity', 'total_amount', 'order_date'];

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function products() {
    	return $this->belongsToMany('App\Product', 'product_order', 'order_id', 'product_id')->withPivot('price','quantity','sub_total') ;
    }
}