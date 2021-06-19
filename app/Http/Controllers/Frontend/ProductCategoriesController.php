<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $product = Product::all();

       // dd($product.js);

        return view('frontend.category.product_categories', [
            'categories' => $categories,
//            'product' => $product
        ]);
    }

    public function productsAjax($id)
    {
       // dd(1);
        $product_list = Product::where('product_category_id', $id)->get();
//d($product_list);
       return response()->json($product_list,200);
    }
}
