<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyProductCategoryRequest;
use App\Http\Requests\Admin\StoreProductCategoryRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Support\Arr;


class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product_categories = ProductCategory::orderby('created_at', 'desc')->get();
       // dd($product_categories);

        return view('admin.product_categories.index',[
            'product_categories' => $product_categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ProductCategory();

        return view('admin.product_categories.create',[
            'model' => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
       //dd($request);
//        foreach ($request->parent_id as $key=> $value) {
//
//            $data = $request->all();
//            $lang = Arr::get($data, 'en.title');
//            $data['name'] = $lang;
//            //dd($data);
//            $data['parent_id'] = $value;
//
//            $product_category = ProductCategory::create($data);
//        }

            $data = $request->all();
            $lang = Arr::get($data, 'en.title');
            $data['name'] = $lang;

        $product_category = ProductCategory::create($data);

        return redirect()->route('admin.product_categories.index')->withSucces('Food category has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        $parent_id = ProductCategory::where('id', $productCategory->parent_id)->get();

        return view('admin.product_categories.show', [
            'product_category' => $productCategory,
            'parent_id' => $parent_id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product_categories.edit', [
            'model' => $productCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
//        foreach ($request->parent_id as $key=> $value) {
//
//            $data = $request->all();
//            $lang = Arr::get($data, 'en.title');
//            $data['name'] = $lang;
//            //dd($data);
//            $data['parent_id'] = $value;
//
//            $product_category = ProductCategory::create($data);
//        }

        $data = $request->all();
        $lang = Arr::get($data, 'en.title');
        $data['name'] = $lang;

        $productCategory->update($data);

        return redirect()->route('admin.product_categories.index')->withSucces('Food category has been successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCategoryRequest $request)
    {
        ProductCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

}
