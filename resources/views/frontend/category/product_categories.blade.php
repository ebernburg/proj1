@extends('layouts.app')

{{--@php--}}
{{--    $userId = auth()->user()->id;--}}

{{--@endphp--}}
@section('content')

    <div class="mains">
        <div class="container py-5">
            <h2 class="pb-2 border-bottom" style="text-align: center;color: wheat">{{_t('Categories & Products')}}</h2>
            {{--            <h4>Choose category</h4>--}}

            <select class="form-select w-50" id="category">
                <option value="">{{_t('Choose category')}}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            {{--            </form>--}}
        </div>
    </div>
    <div class="container-fluid"
         style="background-image: url('/storage/photos/1/bg_small.jpg'); height: 210px; background-repeat: no-repeat; background-size: cover">
    </div>

    <div class="mains" style="height: auto !important;background-image:url('/images/bg_suppliers.jpg');
    background-attachment: fixed;background-repeat: no-repeat">
        <div class="htmlOut row" style="background-size: cover;min-height: 700px">
            <div class="container">
                <div class="row htmlInner clearfix m-3 p-3"></div>
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
                // url: '/ProductAjaxResponsePost',
                url: "/productsAjax/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data[0].name);
                    // alert(data);
                    let block = $('.htmlInner').html('');
                    block.append('<h4 style="text-align: center;color: wheat">{{_t('All products this category')}}: </h4>')
                    //$('.html').html(data[0].name);

                    for (var i = 0; i < data.length; i++) {

                        block.append(
                            '<div class="col-sm-4 mb-2">' + '<div class="card hover">' +
                            '<div class="card-body">' +
                            '<img src="' + data[i].image + '" class="card-img-top scale" alt="..."">' +
                            '<h3 class="card-title center">' +
                            data[i].name +
                            '</h3>' +
                            '<h6 class="card-title"> Price: ' +
                            data[i].price + '  <span style="color:red">Euro</span>' +
                            '</h6>' +
                            '<p class="card-text">Blanditiis consectetur cum dignissimos dolores ea es,epellendus reprehenderit, sed ullam veniam, vitae tghyu?</p>' +
                            '<a href="{{ url('order/product') }}/' + data[i].slug + '"' + 'class="btn btn-primary">More</a>' +
                            '</div>' +
                            '</div>' +
                            '');
                    }

                    //manually trigger a change event for the contry so that the change handler will get triggered
                    // $country.change();
                },
                error: function (data) {
                    console.log('Error:', data);
                }

            });

        });

    </script>
@endpush
