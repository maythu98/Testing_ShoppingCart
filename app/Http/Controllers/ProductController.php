<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = Cart::count();
        $products = Product::get();
        return view('Products.index', compact('products','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request->validate(Product::$rules);
        $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|min:2',
            'stock_quantity' => 'required',
            'description' => 'required|min:10',
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);
        $file = $request->image->store('public/images');
        $file_name = explode('/', $file);


        Product::insert([
            'name' => $request->name,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'description' => $request->description,
            'image' => $file_name[2]
        ]);
        return redirect()->route("products.index")->with('success', 'File Upload Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        // dd($product);
        return view('Products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (!$request->image) {
            $product->update($request->except("_token"));
            return redirect('products');
        }else {
            $file = $request->image->store('public/images');
            $file_name = explode('/', $file);
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock_quantity' => $request->stock_quantity,
                'description' => $request->description,
                'image' => $file_name[2]
            ]);
            return redirect('products');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect('products')->with('success', 'File Delete');
    }
}
