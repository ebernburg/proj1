<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FeedbackController;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Supplier;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
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
            $dataproduct['price'] = $product_model['price'];
            $dataproduct['title'] = $product_model['title'];
            $dataproduct['quantity'] = $product['quantity'];
            $related[$key] = new OrderProduct($dataproduct);

        }

        $order->product()->saveMany($related);
        \Cart::session(($_COOKIE['cart_id']))->clear(); //delete all from cart

        $suppliers = Supplier::all();

//        Mail::send(['text'=>'emails.mail'], ['suppliers', $suppliers], function ($message){
//            $message->to(Auth::user()->email)->subject('Mail from Andrii');
//            $message->from('ialinterexa@gmail.com', 'test email1');
//        });

        return  view('frontend.order.order_closed');
    }

    public function index()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(2);
        //dd($orders);

        return view('frontend.order.my_orders', [
            'orders' => $orders
            ]);
    }

    public function getwholeOrder()
    {

        $startDate = Carbon::createFromTime(0, 0);
        $endDate = Carbon::createFromTime(23, 0);

        $whole_order = Order::whereBetween('created_at',[$startDate, $endDate])->get();
//dd($whole_order);
        return view('frontend.order.whole_order', [
            'whole_order' => $whole_order
        ]);
    }
}
