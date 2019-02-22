<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','age','class','address'];
    public static $rules = [
    	"name" => 'required|min:5',
    	"age" => 'required|min:1',
    	"class" => 'required|min:3',
    	"address" => 'required|min:5'
    ];
}
