const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

//Front

mix.scripts([
    // "resources/frontend/js/app.js",
    //"resources/frontend/js/cart.js",
    "resources/frontend/js/my.js",
    //"resources/frontend/js/product.js",
],'public/frontend_mix/frontend.js');

// mix.js('resources/js/app.js', 'public/frontend_mix/frontend.js')
//     .sass('resources/sass/app.scss', 'public/frontend_mix/frontend.css');

mix.styles([
    'resources/frontend/css/app.css',
    //'resources/frontend/css/cart.css',
    //'resources/frontend/css/cart_responsive.css',
    // 'resources/frontend/css/product.js.css',
    // 'resources/frontend/css/product_responsive.css',
    'resources/frontend/css/style.css',
],'public/frontend_mix/frontend.css');

// mix.sass('resources/frontend/scss/style.scss','public/frontend_mix/frontend.css');

//Admin

mix.scripts([
    "resources/admin/js/admin.js",
    "resources/admin/js/adminlte.js",
    "resources/admin/js/jquery.colorbox-min.js",
    "resources/admin/js/main.js",
    //"resources/admin/js/test.js",
],'public/admin_mix/admin.js');

// mix.js('resources/js/app.js', 'public/admin_mix/admin.js')
//     .sass('resources/sass/app.scss', 'public/admin_mix/admin.css');

mix.styles([
    'resources/admin/css/adminlte.components.css',
    'resources/admin/css/adminlte.core.css',
    'resources/admin/css/adminlte.css',
    'resources/admin/css/adminlte.extra-components.css',
    'resources/admin/css/adminlte.pages.css',
    'resources/admin/css/adminlte.plugins.css',
    'resources/admin/css/colorbox.css',
],'public/admin_mix/admin.css');
