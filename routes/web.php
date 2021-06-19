<?php

use App\Http\Controllers\Admin\ContactFormController;
use App\Http\Controllers\Admin\ImageCarouselController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SuppliersController;
use App\Http\Controllers\Admin\TranslationsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin

Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::group(['middleware' => ['role:admin|manager'], 'as' => 'admin.','prefix' => 'admin_panel'], function () {
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_start');


        Route::delete('product_categories/destroy', [ProductCategoriesController::class, 'massDestroy'])->name('product_categories.massDestroy');
        Route::resource('product_categories', ProductCategoriesController::class);

        //Route::delete('product/destroy', [ProductController::class, 'massDestroy'])->name('product.massDestroy');
        Route::resource('product', ProductController::class);

        Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
        Route::resource('users', UsersController::class);

        Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
        Route::resource('permissions', PermissionsController::class);

        Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
        Route::resource('roles', RolesController::class);

        // Route::delete('suppliers/destroy', [SuppliersController::class, 'massDestroy'])->name('suppliers.massDestroy');
        Route::resource('suppliers', SuppliersController::class);

        //  Route::delete('orders/destroy', [OrdersController::class, 'massDestroy'])->name('orders.massDestroy');
        Route::resource('orders', OrdersController::class);

        // Route::delete('payments/destroy', [PaymentsController::class, 'massDestroy'])->name('payments.massDestroy');
        Route::resource('payments', PaymentsController::class);

        //Route::get('contact-form/index-ajax', [ContactFormController::class, 'indexAjax'])->name('contact-form.index-ajax');
        Route::get('contact-form/destroy', [ContactFormController::class, 'massDestroy'])->name('contact-form.massDestroy');
        // Route::get('contact-form/data', [ContactFormController::class, 'indexAjax'])->name('contact-form.data');
        Route::resource('contact-form', ContactFormController::class);

        //  Route::delete('translations/destroy', [TranslationsController::class, 'massDestroy'])->name('translations.massDestroy');
        Route::resource('translations', TranslationsController::class);

        // Route::delete('image-carousel/destroy', [ImageCarouselController::class, 'massDestroy'])->name('image-carousel.massDestroy');
        // Route::get('image-carousel/index-ajax', [ImageCarouselController::class, 'indexAjax'])->name('image-carousel.index-ajax');
        Route::resource('image-carousel', ImageCarouselController::class);

        // \UniSharp\LaravelFilemanager\Lfm::routes();


        // Route::get('ajax/product.js', [\App\Http\Controllers\Admin\AjaxController::class, 'index'])->name('ajax.product');

        Route::get('/routes', [App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('routes');
        Route::get('/iseed', [App\Http\Controllers\Admin\ConfigController::class, 'iseed'])->name('iseed');
        Route::get('/clear', [App\Http\Controllers\Admin\ConfigController::class, 'clear'])->name('clear');
        Route::get('/fresh', [App\Http\Controllers\Admin\ConfigController::class, 'fresh'])->name('fresh');

        // Route::get('/en', [App\Http\Controllers\Admin\ConfigController::class, 'changeEn'])->name('config.en');
        //Route::get('/de', [App\Http\Controllers\Admin\ConfigController::class, 'changeDe'])->name('config.de');
    });
});

//Site
Route::group(
    [
        'namespace' => 'Fronend',
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'as' => 'frontend.'
    ],
    function () {
        Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
        //COOKIES
        Route::get('/cookies', [App\Http\Controllers\Frontend\HomeController::class, 'cookies'])->name('cookies');

        Route::post('/order/store', [App\Http\Controllers\Frontend\OrderController::class, 'store'])->name('order_store');

//        Route::get('/order/closed', [App\Http\Controllers\Frontend\OrderController::class, 'closed'])->name('order_closed');

        Route::get('/my_orders', [App\Http\Controllers\Frontend\OrderController::class, 'index'])->name('my_orders');

        Route::get('/whole_order', [App\Http\Controllers\Frontend\OrderController::class, 'getwholeOrder'])->name('whole_order');

        Route::get('/order/product/{slug}', [App\Http\Controllers\Frontend\ProductController::class, 'productToZoom'])->name('order_product');

        Route::post('/add-to-cart', [App\Http\Controllers\Frontend\ProductController::class, 'addToCart'])->name('addToCart');

        Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('cart');

        Route::get('/suppliers', [App\Http\Controllers\Frontend\SupplierController::class, 'index'])->name('suppliers');
        Route::get('/supplier/{id}', [App\Http\Controllers\Frontend\SupplierController::class, 'show'])->name('supplier-data');

        Route::get('/choose_supplier', [App\Http\Controllers\Frontend\SupplierController::class, 'choose'])->name('choose_supplier');

        Route::get('/supplier/{slug}/more', [App\Http\Controllers\Frontend\SupplierController::class, 'more'])->name('more_supplier');

        Route::get('/supplier/{id}/change', [App\Http\Controllers\Frontend\SupplierController::class, 'change'])->name('change_supplier');

        Route::get('/get-menu/{slug?}', [App\Http\Controllers\Frontend\SupplierController::class, 'getMenu'])->name('getMenu');

//        Route::get('/supplier/{id}/menu', [App\Http\Controllers\Frontend\SupplierController::class, 'menu'])->name('menu');

        Route::post('/cart/add/', [App\Http\Controllers\Frontend\CartController::class, 'add'])->name('cart_add');
        Route::post('/cart/reduce/', [App\Http\Controllers\Frontend\CartController::class, 'reduce'])->name('cart_reduce');
        Route::get('/cart/clear', [App\Http\Controllers\Frontend\CartController::class, 'clear'])->name('cart_clear');
        Route::post('/cart/removeItem/', [App\Http\Controllers\Frontend\CartController::class, 'removeItem'])->name('cart_removeItem');

        Route::post('/cart/store/', [App\Http\Controllers\Frontend\CartController::class, 'store'])->name('cart_store');
        //  Route::post('cart/add', [App\Http\Controllers\Frontend\CartController::class, 'add'])->name('cart_add');

        Route::post('/contact_form', [\App\Http\Controllers\Frontend\ContactFormController::class, 'store'])->name('contact_form');


        Route::get('/suppliersAjax/{id}', [App\Http\Controllers\Frontend\SupplierController::class, 'suppliersAjax'])->name('suppliersAjax');

        Route::get('/products', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('products');

        Route::get('/product/{slug}', [App\Http\Controllers\Frontend\ProductController::class, 'slug'])->name('product-slug');

        Route::get('/product/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'show'])->name('product-single');

        Route::get('/product_categories', [App\Http\Controllers\Frontend\ProductCategoriesController::class, 'index'])->name('product_categories');

//        Route::get('/productAjaxResponse', [App\Http\Controllers\Frontend\ProductCategoriesController::class, 'productAjaxResponse'])->name('foodByCategoryId1');

        Route::get('/productsAjax/{id}', [App\Http\Controllers\Frontend\ProductCategoriesController::class, 'productsAjax'])->name('productsAjax');
        Route::get('/suppliersAjax/{id}', [App\Http\Controllers\Frontend\SupplierController::class, 'suppliersAjax'])->name('suppliersAjax');



    });
