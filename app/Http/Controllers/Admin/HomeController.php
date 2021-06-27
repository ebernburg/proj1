<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Guest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        Visit::create([
            'admin_count' => 1,
            'ip' => $request->ip()
        ]);
        $suppliers = Supplier::all();

        Mail::send(['text'=>'emails.mail'], ['suppliers', $suppliers], function ($message){
            $message->to('andreyadamchuk80@gmail.com')->subject('Mail from Andrii');
            $message->from('ialinterexa@gmail.com', 'new guest in my project');
        });
        //dd(1);
        $users_count = User::all()->count();
        $orders_count = Order::all()->count();
        $feedback_count = ContactForm::all()->count();
        $suppliers_count = Supplier::all()->count();
        $products_count = Product::all()->count();

        return view('admin.home.index', [
            'users_count' => $users_count,
            'orders_count' => $orders_count,
            'feedback_count' => $feedback_count,
            'suppliers_count' => $suppliers_count,
            'products_count' => $products_count,
        ]);
    }
}
