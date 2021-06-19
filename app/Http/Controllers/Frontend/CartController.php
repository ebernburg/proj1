<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        //dd($_COOKIE['cart_id']);
//        if(!isset($_COOKIE['cart_id'])) {
//            return redirect()->route('frontend.getMenu');
//        }

        $items = \Cart::session(($_COOKIE['cart_id']))->getContent() ;
        return view('frontend.cart.index', [
            'items' => $items
        ]);
    }

    public function add(Request $request)
    {
        \Cart::session(($_COOKIE['cart_id']))->update($request->id, array(

            'quantity' => 1
        ));

        $priceSum = \Cart::session(($_COOKIE['cart_id']))->get($request->id)->getPriceSum(); //qty*price from package

        $totalSubSum = \Cart::session(($_COOKIE['cart_id']))->getSubTotal(); // total sum

        $badgeProductsHeader = \Cart::session(($_COOKIE['cart_id']))->getTotalQuantity(); // total products in header

        return response()->json([

            'priceSum' => number_format($priceSum,2),
            'totalSubSum' => number_format($totalSubSum,2),
            'badgeProductsHeader' => $badgeProductsHeader,
        ], 200);
    }

    public function reduce(Request $request)
    {
        \Cart::session(($_COOKIE['cart_id']))->update($request->id, array(

            'quantity' => -1
        ));

        $priceSum = \Cart::session(($_COOKIE['cart_id']))->get($request->id)->getPriceSum(); //qty*price from package

        $totalSubSum = \Cart::session(($_COOKIE['cart_id']))->getSubTotal(); // total sum

        $badgeProductsHeader = \Cart::session(($_COOKIE['cart_id']))->getTotalQuantity(); // total products in header

        return response()->json([

            'priceSum' => number_format($priceSum,2),
            'totalSubSum' => number_format($totalSubSum,2),
            'badgeProductsHeader' => $badgeProductsHeader,
        ], 200);
    }

    public function clear()
    {
        \Cart::session(($_COOKIE['cart_id']))->clear();

        return back();
    }

    public function removeItem(Request $request)
    {
        //dd(1);
        \Cart::session(($_COOKIE['cart_id']))->remove($request->id); //delete this item from cart

         $totalSubSum = \Cart::session(($_COOKIE['cart_id']))->getSubTotal(); // total sum

        $badgeProductsHeader = \Cart::session(($_COOKIE['cart_id']))->getTotalQuantity(); // total products in header

        return response()->json([

            'totalSubSum' => number_format($totalSubSum,2),
            'badgeProductsHeader' => $badgeProductsHeader,
        ], 200);

    }

}
