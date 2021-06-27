<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Supplier;
use App\Models\Visit;
use App\Models\ImageCarousel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Appstract\Options\Option;

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
    public function index(Request $request)
    {
        Visit::create([
            'frontend_count' => 1,
            'ip' => $request->ip(),
            ]);

        $suppliers = Supplier::all();

        Mail::send(['text'=>'emails.mail'], ['suppliers', $suppliers], function ($message){
            $message->to('andreyadamchuk80@gmail.com')->subject('Mail from Andrii');
            $message->from('ialinterexa@gmail.com', 'new guest in my project');
        });

        //dd($guest);

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
