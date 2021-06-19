<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageCarouselRequest;
use App\Models\ImageCarousel;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ImageCarouselController extends Controller
{

    public function indexAjax(DataTables $dataTables)
    {
        return $dataTables->eloquent(ImageCarousel::query())
            ->addColumn('action', 'admin.image-carousel.actions')
            ->rawColumns(['action'])
            ->editColumn('status', function(ImageCarousel $model) {
                return _t($model::STATUSES[$model->status]);
            })
            ->editColumn('created_at', function(ImageCarousel $model) {
                return $model->created_at;
            })
            ->addIndexColumn()
            ->make(true);
    }
    public function index()
    {

//        $columns=[
//            ['data'=>'key','name'=>'key','visible'=>true],
//            ['data'=>'title','name'=>'title','visible'=>true],
//            ['data'=>'status','name'=>'status','searchable'=>true],
//            ['data'=>'created_at','name'=>'created_at'],
//            ['data'=>'action','name'=>'action','orderable'=>false],
//        ];
//        $orders=[
//            [2,'desc']
//        ];

        $carousels = ImageCarousel::all();

        return view('admin.image-carousel.index', [
            'carousels' => $carousels
            ]);

       // return view('admin.image-carousel.index', compact('columns','orders'));
    }


    public function create()
    {


        $model=new ImageCarousel();
        $model->status=1;
        $model->items=[
            [
                'image'=>'',
                'url'=>'',
                'alt_en'=>'',
                'alt_de'=>''
            ]
        ];
        $model->fill(old());
        return view('admin.image-carousel.create', [
            'model' => $model
        ]);
    }


    public function store(Request $request)
    {

        //dd($request);
        $data = $request->all();

        $model = ImageCarousel::create($data);

        return redirect()->route('admin.image-carousel.index');
    }




    public function edit(ImageCarousel $imageCarousel)
    {
        //dd($imageCarousel);

        $imageCarousel->fill(old());

        //dd($imageCarousel);

        return view('admin.image-carousel.edit', ['model'=>$imageCarousel]);
    }

    public function update(ImageCarouselRequest $request, ImageCarousel $imageCarousel)
    {
        $imageCarousel->fill($request->all());

        $imageCarousel->save();
        return redirect()->route('admin.image-carousel.index');
    }


    public function destroy(ImageCarousel $imageCarousel)
    {
        $imageCarousel->delete();

        return back();
    }
}
