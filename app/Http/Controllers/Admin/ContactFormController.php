<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactFormRequest;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactFormController extends Controller
{
    public function indexAjax(DataTables $dataTables)
    {
        return $dataTables->eloquent(ContactForm::query())
            ->addColumn('action', 'admin.contact-form.actions')
            ->rawColumns(['action'])
            ->editColumn('status', function(ContactForm $post) {
                return $post::STATUSES[$post->status];
            })
            ->editColumn('created_at', function(ContactForm $post) {
                return $post->created_at;
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function index()
    {
//        $columns=[
//            ['data'=>'name','name'=>'name','visible'=>true],
//            ['data'=>'email','name'=>'email','visible'=>true],
//            ['data'=>'status','name'=>'status','searchable'=>true],
//            ['data'=>'created_at','name'=>'created_at'],
//            ['data'=>'action','name'=>'action','orderable'=>false],
//        ];
//        $orders=[
//            [3,'desc']
//        ];
        $contforms = ContactForm::all();

        return view('admin.contact-form.index', [
            'contforms' => $contforms
        ]);


//        $contforms = ContactForm::all();
//        return datatables()->of($contforms)->toJson();

    }

    public function data()
    {
        //$contforms = ContactForm::all();
        return Datatables::of(ContactForm::all())->toJson();
    }



    public function create()
    {
        $model=new ContactForm();
        return view('admin.contact-form.create', [
            'model' => $model
        ]);
    }


    public function store(ContactFormRequest $request)

    {
        //dd($request);
        ContactForm::create($request->all());

        return redirect()->route('admin.contact-form.index');
    }


    public function show(ContactForm $contactForm)
    {
        //
    }


    public function edit(ContactForm $contactForm)
    {
        return view('admin.contact-form.edit',['model'=>$contactForm]);
    }


    public function update(ContactFormRequest $request, ContactForm $contactForm)
    {
        $contactForm->fill($request->all());
        $contactForm->save();
        return redirect()->route('admin.contact-form.index');
    }


    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();
        return back();
    }
}
