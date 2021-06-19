@extends('layouts.app')

@section('content')

    <div class="main" style="background-image: url('/images/bg_suppliers.jpg')">
        <div class="container py-5">
            <h2 class="pb-2 border-bottom" style="text-align: center;color: wheat">{{_t('Suppliers & products')}}</h2>
{{--            <h4>Choose supplier</h4>--}}


            <!-- Select -->
            <select class="form-select w-50" id="category">
                <option value="">{{_t('Choose supplier')}}</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="container-fluid"
         style="background-image: url('/storage/photos/1/bg_small.jpg'); height: 210px; background-repeat: no-repeat; background-size: cover">
    </div>

    <div class="mains" style="height: auto !important;background-image:url('/images/bg_suppliers.jpg');
    background-attachment: fixed;background-repeat: no-repeat">
        <div class="htmlOut row" style="background-size: cover; min-height: 700px">
            <div class="container">
                <div class="row htmlInner"></div>
            </div>
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
                url: "/suppliersAjax/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function (data) {
                    //console.log(data);
                    //alert(data);
                    let block = $('.htmlInner').html('');
                    block.append('<h4 style="text-align: center; color: wheat">{{_t('Products')}}</h4>')
                    //$('.html').html(data[0].name);

                    for (var i = 0; i < data.length; i++) {

                        block.append(
                            '<div class="col-sm-4">' +
                            '<div class="card hover m-2">' +
                            '<div class="card-body">' +
                            '<img src="' + data[i].image + '" class="card-img-top" alt="...">' +
                            '<h3 class="card-title center">' +
                            data[i].name +
                            '</h3>' +
                            '<h6 class="card-title"> Price: ' +
                            data[i].price + '  <span style="color:red">Euro</span>' +
                            '</h6>' +
                            '<p class="card-text">Blanditiis consectetur cum dignissimos molestiae mollitia, numquam optio perspiciatis quaerat quidem quis, ratione tenetur! Corporis, et impedit incidunt inventore ipsum maiores quaerat quod repellendus reprehenderit, sed ullam veniam, vitae?</p>' +
                            '<a href="{{ url('order/product') }}/' + data[i].slug + '"' + 'class="btn btn-primary">More</a>' +
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
