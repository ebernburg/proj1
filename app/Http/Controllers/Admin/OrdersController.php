<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::all();
        $users = User::all();
        $payments = Payment::all();

        return view('admin.orders.index', [
            'orders' => $orders,
            'users' => $users,
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Order();
        //dd([OrderProduct::first()]);
        $model->productOrder =  [OrderProduct::first()];
//dd($model->productOrder);


        return view('admin.orders.create', [
            'model' => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $data = $request->all();
        $product_order = $data['product'];
        unset($data['product']);

        $order = new Order();
        $order->fill($data);
        $order->save();

        $related = [];
        foreach ($product_order as $key => $product) {
            $product_model = Product::where(['id'=> $product['product_id']])->first();
            //dd($product_model);
            $dataProduct = [];
            $dataproduct['order_id'] = $order['id'];
            $dataproduct['product_id'] = $product_model['id'];
            $dataproduct['price'] = $product['price'];
            $dataproduct['title'] = $product_model['title'];
            $dataproduct['quantity'] = $product['quantity'];
            $related[$key] = new OrderProduct($dataproduct);

        }

        $order->product()->saveMany($related);

        return  redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {

        return view('admin.orders.edit', [
            'model' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->all();
        $product_order = $data['product'];
        unset($data['product']);

        $order = new Order();
        $order->fill($data);
        $order->save();

        $related = [];
        foreach ($product_order as $key => $product) {
            $product_model = Product::where(['id'=> $product['product_id']])->first();
            $dataproduct = [];
            $dataproduct['order_id'] = $order->id;
            $dataproduct['product_id'] = $product_model->id;
            $dataproduct['price'] = $product['price'];
            $dataproduct['title'] = $product_model->title;
            $dataproduct['quantity'] = $product['quantity'];
            $related[$key] = new OrderProduct($dataproduct);

        }
        $order->product()->delete();
        $order->product()->saveMany($related);

        return  redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return back();

    }

}
