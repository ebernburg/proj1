<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::all();

        return view('frontend.product.product_list', [
            'product_list' => $products
        ]);

//        return response()->json($product);
    }

    public function productToZoom($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        //dd($product);

        return view('frontend.product.show', [
            'product' => $product
        ]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();


//        if (Auth::check()){
//            $user_id = Auth::id();
//            if(!isset($_COOKIE['cart_id'])){
//                setcookie('cart_id', $user_id);
//            }
//            $cart_id = $_COOKIE['cart_id'];
//            \Cart::session($cart_id);
//        }
//        else {
//            if(!isset($_COOKIE['cart_id'])) {
//                setcookie('cart_id', uniqid(), '/');
//            }
//        if(!isset($_COOKIE['cart_id'])) {
//            setcookie('cart_id', uniqid(), '/');
//        }

        \Cart::session($_COOKIE['cart_id']);

        \Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->qty,
                'description' => $product->description,
                'attributes' => [
                    'image' => $product->image,
                ]
            ]);

        return response()->json(\Cart::session($_COOKIE['cart_id'])->getContent());
    }

    public function slug($slug)
    {
        $product = Product::where('slug', $slug)->get();
        dd($product);

    }
}
