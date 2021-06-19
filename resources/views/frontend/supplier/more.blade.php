@extends('layouts.app')

@section('content')

    <div class="mains">
        <div class="container py-5">

        </div>


{{--        <div class="container-fluid"--}}
{{--             style="background-image: url('https://thumbs.dreamstime.com/b/flat-lay-peoples-hands-homemade-soup-bread-slices-people-eating-autumn-winter-creamy-vegan-soups-over-white-table-209137970.jpg');--}}
{{--         height: 250px; background-repeat: no-repeat; background-size: cover">--}}

{{--        </div>--}}

        <div class="container py-5">

            <div class="card mb-3 text-center">
                <h2 class="card-title text-center">{{ $supplier->name }}</h2>
                <img src="{{ $supplier->image }}" class="img-fluid" width="1250px" height="520px" alt="...">
                <div class="card-body">
                    <h2 class="card-title text-center">{{_t('Description')}}: </h2>
                    <p class="card-text text-center">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="{{ route('frontend.getMenu', $supplier->slug) }}" class="btn btn-primary">{{_t('To menu')}}</a>
                    <a href="{{ route('frontend.choose_supplier') }}" class="btn btn-danger">{{_t('Back')}}</a>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>

        </div>

{{--        <div class="container-fluid"--}}
{{--             style="background-image: url('https://thumbs.dreamstime.com/b/flat-lay-peoples-hands-homemade-soup-bread-slices-people-eating-autumn-winter-creamy-vegan-soups-over-white-table-209137970.jpg');--}}
{{--         height: 250px; background-repeat: no-repeat; background-size: cover">--}}

{{--        </div>--}}
        <div class="container py-5">

        </div>
    </div>
@endsection
@push('script')
    <script>

        $('#category').change(function () {
            let id = $(this).find(':selected').val();
            //alert(id);
            $.ajax({
                type: 'get',
                // url: '/productAjaxResponsePost',
                url: "productAjaxResponseGet/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data[0].name);
                    //alert(data);
                    let block = $('.htmlInner').html('');
                    block.append('<h4 style="text-align: center">{{_t('All products this category')}}: </h4>')
                    //$('.html').html(data[0].name);

                    for (var i = 0; i < data.length; i++) {

                        block.append(
                            '<div class="col-sm-4">' +
                            '<div class="card">' +
                            '<div class="card-body">' +
                            '<img src="' + data[i].image + '" class="card-img-top" alt="...">' +
                            '<h3 class="card-title center">' +
                            data[i].name +
                            '</h3>' +
                            '<h6 class="card-title"> Price: ' +
                            data[i].price + '  <span style="color:red">Euro</span>' +
                            '</h6>' +
                            '<p class="card-text">Blanditiis consectetur cum dignissimos dolores ea eligendi eum eveniet laborum molestiae mollitia, numquam optio perspiciatis quaerat quidem quis, ratione tenetur! Corporis, et impedit incidunt inventore ipsum maiores quaerat quod repellendus reprehenderit, sed ullam veniam, vitae?</p>' +
                            '<a href="{{ url('admin_panel/product') }}/' + data[i].slug + '"' + 'class="btn btn-primary">More</a>' +
                            '</div>' +
                            '</div>' +
                            '');
                    }

                    //manually trigger a change event for the contry so that the change handler will get triggered
                    // $country.change();
                }
            });

        });

    </script>
@endpush

