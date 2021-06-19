<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-panel - @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.31/example1/colorbox.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/6bua4k7i7kn4gv19yyhpg3n9avafajrt85z9glb0rf1t8e55/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="{{ mix('/admin_mix/admin.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            @yield('header_buttons')
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link"  href="{{ route('admin_mix.config.en') }}" role="button">en</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link"  href="{{ route('admin_mix.config.de') }}" role="button">de</a>--}}
{{--            </li>--}}




            <ul>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <li>
                        <a class="nav-link"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </ul>
@php
//dd(App::getLocale());
@endphp

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.admin_start') }}" class="brand-link">
            <img src="/images/logo_admin_panel.png" alt="AdminLTE Logo" class="brand-image img-thumbnail elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin-panel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/images/logo_admin.jpg" class="img-thumbnail elevation-2" alt="User Image">
                    <span class="text-white font-weight-light ml-1">Andrii</span>
                </div>
                <div class="info">
{{--                    <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name}}</a>--}}
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route("admin.contact-form.index") }}" class="nav-link {{ request()->is('*admin_/contact-form') || request()->is('*admin/contact-form/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                {{ ('Feedback') }}
                            </p>
                            <span class="badge {{\App\Models\ContactForm::count()>0?'badge-danger':'badge-info'}}">{{\App\Models\ContactForm::count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
{{--                            <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                    <li class="nav-header">USER MANAGEMENT</li>
                    {{--                    Role--}}
{{--                    @can('role_access')--}}
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link" >
                            <i class="nav-icon fas fa-lock"></i>
                            <p>
                                Roles
                            </p>
                        </a>
                    </li>
{{--                    @endcan--}}
{{--                    @can('permission_access')--}}
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}" class="nav-link" >
                            <i class="nav-icon fas fa-lock"></i>
                            <p>
                                Permissions
                            </p>
                        </a>
                    </li>
{{--                    @endcan--}}
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }} " class="nav-link" >
                            <i class="fas fa-user-cog nav-icon"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">CONTENT</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-newspaper nav-icon"></i>
                            <p>News</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Banners</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.translations.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-globe-europe"></i>
                            <p>Translations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.image-carousel.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Carousel images</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Gallery</p>
                        </a>
                    </li>



{{--                    Product Categories--}}
                    @can('supplier_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.product_categories.index') }}" class="nav-link" >
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>

                                Product Categories
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}" class="nav-link">
                            <i class="fas fa-utensils nav-icon"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-thumbtack"></i>
                            <p>Order</p>
                            <span class="badge {{\App\Models\Order::count()>0?'badge-danger':'badge-info'}}">{{\App\Models\Order::count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.suppliers.index') }}" class="nav-link">
                            <i class="fas fa-layer-group nav-icon"></i>
                            <p>Supplier</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.payments.index') }}" class="nav-link">
                            <i class="fas fa-money-check nav-icon"></i>
                            <p>Payment</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.payments.index') }}" class="nav-link">
                            <i class="fas fa-truck nav-icon"></i>
                            <p>Delivery</p>
                        </a>
                    </li>
                    @endcan

                    {{--                    For developer--}}

                    <li class="nav-item">
                        <a href="#" class="nav-link" >
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                For developer
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.routes') }}" class="nav-link ">
                                    <i class="fas fa-user-cog nav-icon"></i>
                                    <p>All routes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.iseed') }}" class="nav-link">
                                    <i class="fas fa-user-cog nav-icon"></i>
                                    <p>Seeds make</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.clear') }}" class="nav-link">
                                    <i class="fas fa-user-cog nav-icon"></i>
                                    <p>Caches clear</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.fresh') }}" class="nav-link">
                                    <i class="fas fa-user-cog nav-icon"></i>
                                    <p>DB update</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
@yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 Andrii Adamchuk</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
{{--<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>--}}

@stack('scripts')
<script src="{{ mix('/admin_mix/admin.js') }}"></script>

</body>
</html>

