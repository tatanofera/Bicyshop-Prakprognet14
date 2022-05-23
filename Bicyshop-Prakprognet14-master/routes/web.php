<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Auth::routes(['verify' => true]); //verifikasi email

Route::get('/', [App\Http\Controllers\LandingController::class, 'landingpage'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('landing')->middleware('verified');
Route::get('/cart', [App\Http\Controllers\User\CartController::class, 'index'])->name('cart.index')->middleware('verified');
Route::post('/cart/store', [App\Http\Controllers\User\CartController::class, 'store'])->name('cart.add')->middleware('verified');
Route::post('/cart/delete-{id}', [App\Http\Controllers\User\CartController::class, 'delete'])->name('cart.delete')->middleware('verified');
Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('userprofile');

Route::get('/admin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard-product', [App\Http\Controllers\Admin\DashboardAdminController::class, 'product'])->name('product');
    Route::get('/dashboard-product-add', [App\Http\Controllers\Admin\ProductController::class, 'product_add'])->name('product-add');
    Route::post('/add-product-submit', [App\Http\Controllers\Admin\ProductController::class, 'product_add_submit'])->name('product-add-submit');
    Route::get('/{id}-detail-product', [App\Http\Controllers\Admin\ProductController::class, 'product_detail'])->name('product-detail');
    Route::get('/{id}-edit-product', [App\Http\Controllers\Admin\ProductController::class, 'product_edit'])->name('product-edit');
    Route::post('/{id}-edit-product-submit', [App\Http\Controllers\Admin\ProductController::class, 'product_edit_submit'])->name('product-edit-submit');
    Route::post('/{id}-delete-image-product', [App\Http\Controllers\Admin\ProductController::class, 'product_image_delete'])->name('product-image-delete');
    Route::post('/{id}-delete-product', [App\Http\Controllers\Admin\ProductController::class, 'product_delete'])->name('product-delete');
    Route::get('/dashboard-product-trash', [App\Http\Controllers\Admin\ProductController::class, 'product_trash'])->name('product-trash');
    Route::get('/{id}-product-restore', [App\Http\Controllers\Admin\ProductController::class, 'product_restore'])->name('product-restore');
    Route::post('/{id}-product-delete-permanently', [App\Http\Controllers\Admin\ProductController::class, 'product_delete_permanently'])->name('product-delete-permanently');

    Route::get('/dashboard-courier', [App\Http\Controllers\Admin\DashboardAdminController::class, 'courier'])->name('courier');
    Route::get('/dashboard-courier-add', [App\Http\Controllers\Admin\CourierController::class, 'courier_add'])->name('courier-add');
    Route::post('/add-courier-submit', [App\Http\Controllers\Admin\CourierController::class, 'courier_add_submit'])->name('courier-add-submit');
    Route::get('/{id}-edit-courier', [App\Http\Controllers\Admin\CourierController::class, 'courier_edit'])->name('courier-edit');
    Route::post('/{id}-edit-courier-submit', [App\Http\Controllers\Admin\CourierController::class, 'courier_edit_submit'])->name('courier-edit-submit');
    Route::post('/{id}-delete-courier', [App\Http\Controllers\Admin\CourierController::class, 'courier_delete'])->name('courier-delete');
    Route::get('/dashboard-courier-trash', [App\Http\Controllers\Admin\CourierController::class, 'courier_trash'])->name('courier-trash');
    Route::get('/{id}-courier-restore', [App\Http\Controllers\Admin\CourierController::class, 'courier_restore'])->name('courier-restore');
    Route::post('/{id}-courier-delete-permanently', [App\Http\Controllers\Admin\CourierController::class, 'courier_delete_permanently'])->name('courier-delete-permanently');

    Route::get('/dashboard-product-categories', [App\Http\Controllers\Admin\DashboardAdminController::class, 'product_categories'])->name('product-categories');
    Route::get('/dashboard-product-categories-add', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_add'])->name('product-categories-add');
    Route::post('/add-product-categories-submit', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_add_submit'])->name('product-categories-add-submit');
    Route::get('/{id}-edit-product-categories', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_edit'])->name('product-categories-edit');
    Route::post('/{id}-edit-product-categories-submit', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_edit_submit'])->name('product-categories-edit-submit');
    Route::post('/{id}-delete-product-categories', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_delete'])->name('product-categories-delete');
    Route::get('/dashboard-product-categories-trash', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_trash'])->name('product-categories-trash');
    Route::get('/{id}-product-categories-restore', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_restore'])->name('product-categories-restore');
    Route::post('/{id}-product-categories-delete-permanently', [App\Http\Controllers\Admin\ProductCategoriesController::class, 'product_categories_delete_permanently'])->name('product-categories-delete-permanently');

    Route::get('/dashboard-discount', [App\Http\Controllers\Admin\DashboardAdminController::class, 'discount'])->name('discount');
    Route::get('/dashboard-discount-add', [App\Http\Controllers\Admin\DiscountController::class, 'discount_add'])->name('discount-add');
    Route::post('/add-discount-submit', [App\Http\Controllers\Admin\DiscountController::class, 'discount_add_submit'])->name('discount-add-submit');
    Route::get('/{id}-edit-discount', [App\Http\Controllers\Admin\DiscountController::class, 'discount_edit'])->name('discount-edit');
    Route::post('/{id}-edit-discount-submit', [App\Http\Controllers\Admin\DiscountController::class, 'discount_edit_submit'])->name('discount-edit-submit');
    Route::post('/{id}-delete-discount', [App\Http\Controllers\Admin\DiscountController::class, 'discount_delete'])->name('discount-delete');
    Route::get('/dashboard-discount-trash', [App\Http\Controllers\Admin\DiscountController::class, 'discount_trash'])->name('discount-trash');
    Route::get('/{id}-discount-restore', [App\Http\Controllers\Admin\DiscountController::class, 'discount_restore'])->name('discount-restore');
    Route::post('/{id}-discount-delete-permanently', [App\Http\Controllers\Admin\DiscountController::class, 'discount_delete_permanently'])->name('discount-delete-permanently');
});
