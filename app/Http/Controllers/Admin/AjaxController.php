<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function index()
    {
        //dd(1);

        $users = User::all();

        return view('admin.q', [
            'users' => $users
        ]);
    }
}
