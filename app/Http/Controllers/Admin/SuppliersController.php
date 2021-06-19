<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroySuppliersRequest;
use App\Http\Requests\Admin\StoreSupplierRequest;
use App\Http\Requests\Admin\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('admin.suppliers.index',[
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //dd(\App\Models\Supplier::STATUSES);

        $model = new Supplier();
        $model->active = 1;

        return view('admin.suppliers.create', [
            'model' => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
            if($request->input('active') == 1) {

                foreach (Supplier::all() as $supplier) {
                    $supplier->update(['active' => 0]) ;
                }
            }

            $request->active = 1;
            $data = $request->all();

            $supplier = Supplier::create($data);

        return redirect()->route('admin.suppliers.index')->withSucces('Supplier has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $parent_id = Supplier::where('id', $supplier->parent_id)->get();

        return view('admin.suppliers.show', [
            'supplier' => $supplier,
            'parent_id' => $parent_id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', [
            'model' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //dd($request);
        if($request->input('active') == 1) {

            foreach (Supplier::all() as $suppl) {
                $suppl->update(['active' => 0]) ;
            }
            $request->active = 1;
        }

        $data = $request->all();
        $supplier->update($data);

        return redirect()->route('admin.suppliers.index')->withSucces('Supplier has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back();
    }

    public function massDestroy(MassDestroySuppliersRequest $request)
    {
        Supplier::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
