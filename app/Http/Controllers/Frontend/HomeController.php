<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImageCarousel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Option;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       // dd(1);
    session()->put('locale', 'en');
        //session()->flush();
        $uniqid = uniqid();

        if(!isset($_COOKIE['user-cookies'])) {
        $_COOKIE['user-cookies'] = $uniqid;
    }

        if(!isset($_SESSION['user-cookies'])) {
            $_SESSION['user-cookies'] = $uniqid;
        }

//        if(!isset($_SESSION['cart_id'])) {
//            $_SESSION['cart_id'] = uniqid();
//        }

        $carousels = ImageCarousel::where('key', 'gallery1')->get();
       // dd($carousels);

        return view('home', [
            'carousels' => $carousels
        ]);
    }

    public function cookies()
    {
        if(isset($_COOKIE['user-cookies'])) {
            session()->put('user-cookies', $_COOKIE['user-cookies']);
        }
        else{
            return route('home');
        }

        if(isset($_COOKIE['cart_id'])) {
            session()->put('cart_id', $_COOKIE['cart_id']);
        }

//
//        if(isset($_COOKIE['cart_id'])) {
//            session()->put('cart_id', $_COOKIE['cart_id'], '/');
//        }
//
        return response()->json('1',200);
    }
}
