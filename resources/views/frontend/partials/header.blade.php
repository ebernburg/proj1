<!--HEADER-->
<div class="bg-light ">

    <nav class="navbar navbar-expand-lg fixed-top" aria-label="Main navigation" style="background-image: url('/images/wooden-spoon-fork-wooden-background_33736-1062.jpg');background-size: cover;
">
        <div class="container-fluid">

{{--                @can('order_access')--}}
                    <a class="nav-link" href="{{ route('frontend.getMenu') }}">{{_t('Menu')}}</a>
                    <a class="nav-link" href="{{ route('frontend.choose_supplier') }}">{{_t('Choose supplier')}}</a>
{{--                @endcan--}}
                <a class="nav-link" href="{{ route('frontend.suppliers') }}">{{_t('Suppliers & Products')}}</a>
{{--                <a class="nav-link" href="{{ route('frontend.Product_categories') }}">Categories & Product</a>--}}

                    <a href="{{ route('frontend.product_categories') }}" class="nav-link">
{{--                        <svg class="icon-menu">--}}
{{--                            <use xlink:href="#ic-menu"></use>--}}
{{--                        </svg>--}}
                        {{_t('Categories & Products')}}
{{--                        <svg class="icon"><use xlink:href="#ic-arr-down"></use></svg>--}}

                    </a>


{{--                <a class="nav-link" href="{{ route('frontend.Product') }}">All Product</a>--}}

                @can('manager_access')
                    <a class="nav-link" href="{{ route('frontend.whole_order') }}">{{_t('Whole order for today')}}</a>
                @endcan
                @auth
                    <a class="nav-link" href="{{ route('frontend.my_orders') }}">{{_t('My orders')}}</a>
                    <a href="{{ route('logout') }}" class="nav-link"

                       onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        {{_t('Logout')}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                    @can('admin-access')
                        <a class="nav-link" href="{{ route('admin.admin_start') }}">{{_t('Admin')}}</a>
                    @endcan

            @endauth
            @guest()
                    <a class="nav-link link link-hidden link-visible" href="{{ route('login')}}">{{_t('login')}}</a>
                    <a class="nav-link link-hidden link-visible" href="{{ route('register')}}">{{_t('Register')}}</a>
            @endguest
            <div class="shop-cart">

                <a class="nav-link" href="{{ route('frontend.cart') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge bg-light text-dark rounded-pill align-text-bottom cart-qty new_qty">{{isset($_COOKIE['cart_id']) ? \Cart::session($_COOKIE['cart_id'])->getTotalQuantity() : '0'}}</span>
                </a>
            </div>
        </div>
    </nav>


    <div class="nav-scroller bg-body shadow-sm">
        <nav class="nav nav-underline d-flex justify-content-around" aria-label="Secondary navigation">
            <a class="nav-link" href="{{route('frontend.home')}}">
                <img src="/storage/photos/1/my_logo.png" alt="" width="125px" height="50px">
            </a>
            <a class="nav-link" href="#">
                News
                <span class="badge bg-light text-dark rounded-pill align-text-bottom">27</span>
            </a>
            <a class="nav-link" href="#">{{_t('About us')}}</a>

            <a class="nav-link" href="{{ route('frontend.getMenu') }}"> <span style="color: #0a0e14">{{_t('Click to')}} >>>>></span> <strong style="color: red">{{_t('Menu for today')}}</strong></a>
            @auth
            <div class="nav-link ml-2" ><strong>{{_t('Hello')}}, {{ \Illuminate\Support\Facades\Auth::user()->name }}</strong></div>
            @endauth
            <ul>
                <div class="d-flex d-inline">
                @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <li class="">
{{--                        <a class="nav-link1"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                            <img src="/storage/photos/1/icon-germany.png" alt="" width="20px">{{ $properties['native'] }}--}}
{{--                        </a>--}}
                        <a class="nav-link" href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img src={{ $properties['native'] ==='en'? "/storage/photos/1/icon_United_Kingdom.png" : "/storage/photos/1/icon-germany.png" }} alt="" width="30px">{{ $properties['native'] }}</a>
                    </li>
                @endforeach
                </div>
            </ul>

        </nav>
    </div>

</div>
