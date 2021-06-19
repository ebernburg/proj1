<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name', 'andrii') }}</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/offcanvas.css" rel="stylesheet">

    <link href="/frontend_mix/frontend.css" rel="stylesheet">
    @yield('custom_css')
    @yield('custom_css2')


{{--    <link rel="stylesheet" type="text/css" href="/resources/frontend_mix/css/cart.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="/resources/frontend_mix/css/cart_responsive.css">--}}

</head>
<body>
<div id="app" class="{{ (session()->exists('user-cookies')) ? '' : 'wrapper-page' }}">
{{--<div id="app" class="">--}}

    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')
</div>
    @include('frontend.partials.cookies.cookies-access')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/5.0/examples/offcanvas-navbar/offcanvas.js"></script>
<script src="/frontend_mix/frontend.js"></script>
@stack('script')
@stack('script2')
@yield('custom_js')
</body>
</html>
