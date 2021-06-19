<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return view('frontend.supplier.all_suppliers', [
            'suppliers' => $suppliers
        ]);
//        return response()->json($suppliers);
    }

    public function show($id)
    {
        $supplier = Supplier::where('id', $id)->firstOrFail();
        //dd($supplier);

//        return view('frontend.supplier', [
//            'supplier' => $supplier
//        ]);

        return response()->json($supplier);
    }

    public function suppliersAjax($id)
    {
        $product_list = Product::where('supplier_id', $id)->get();

        return response()->json($product_list,200);
    }

    public function choose()
    {
        $suppliers = Supplier::paginate(5);
        $current_supplier = Supplier::where('active', 1)->first() ?? 'No active supplier';
        //dd($current_supplier);

        return view('frontend.supplier.choose_supplier', [
            'suppliers' => $suppliers,
            'current_supplier' => $current_supplier
        ]);
    }

    public function more($slug)
    {
        $supplier = Supplier::where('slug', $slug)->firstOrFail();

        return view('frontend.supplier.more', [
            'supplier' => $supplier
        ]);
    }

    public function change($slug)
    {
        foreach (Supplier::all() as $suppl) {
            $suppl->update(['active' => 0]) ;
        }

        $supplier = Supplier::where('slug', $slug)->firstOrFail();
        //dd($supplier);
        $supplier->active = 1;
        $supplier->save();

        return redirect()->route('frontend.choose_supplier');
    }


    public function getMenu($slug=null)
    {
        if($slug==null) {
            $menu = Supplier::where('active', 1)->first()->products;
            $toggleButtonBuy = true;
            $currentSupplier = Supplier::where('active', 1)->first();
        }
       else {
           $menu = Supplier::where('slug', $slug)->firstOrFail()->products;
           $toggleButtonBuy = false;
           $currentSupplier = Supplier::where('slug', $slug)->firstOrFail();
       }

        $product_categories = ProductCategory::orderBy('sort')->get();


        return  view('frontend.menu', [
            'product_categories' => $product_categories,
            'product_list' => $menu,
            'toggleButtonBuy' => $toggleButtonBuy,
            'currentSupplier' => $currentSupplier
        ]);
    }
}
