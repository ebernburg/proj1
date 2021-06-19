<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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
