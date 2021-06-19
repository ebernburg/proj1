<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyPaymentRequest;
use App\Http\Requests\Admin\MassDestroySuppliersRequest;
use App\Http\Requests\Admin\StorePaymentRequest;
use App\Http\Requests\Admin\UpdateProductCategoryRequest;
use App\Http\Requests\Admin\PaymentRequest;
use App\Models\Payment;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return view('admin.payments.index',[
            'payments' => $payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Payment();

        return view('admin.payments.create', [
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

        $payment = Payment::create($data);

        return redirect()->route('admin.payments.index')->withSucces('Payment has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentRequest $payment)
    {
        return view('admin.payments.show', [
            'payment' => $payment
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', [
            'model' => $payment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        //dd($request);
        //dd($payment);
        $data = $request->all();
        $payment->update($data);

        return redirect()->route('admin.payments.index')->withSucces('Payment has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Supplier::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
