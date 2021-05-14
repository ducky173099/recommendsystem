<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminUserMainController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminFeatureController;

use App\Http\Controllers\PageCategoryProductController;
use App\Http\Controllers\PageProductController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageOrderController;
use App\Http\Controllers\PageCustomerController;


// ---------------------- Admin --------------------------------
Route::get('/admin', function () {
    return view('admin.dashboard');
});

//từ đây bắt đầu là cho user
Route::get('/user', [AdminUserMainController::class, 'show_user']);
Route::get('/user/add-user', [AdminUserMainController::class, 'create']);
//AdminUserMainController:la ten controller
//create_user la ten ham minh dat
Route::post('/user/create', [AdminUserMainController::class, 'store']);
Route::get('/user/edit-user/{id}', [AdminUserMainController::class, 'edit']);
Route::get('/user/delete-user/{id}', [AdminUserMainController::class, 'delete']);
Route::post('/user/update-user/{id}', [AdminUserMainController::class, 'update']);


//từ đây bắt đầu là cho product
Route::get('/product', [AdminProductController::class, 'product_show']);
Route::get('/product/add-product', [AdminProductController::class, 'create']);
Route::post('/product/create', [AdminProductController::class, 'store']);
Route::get('/product/edit-product/{id}', [AdminProductController::class, 'edit']);
Route::post('/product/update-product/{id}', [AdminProductController::class, 'update']);
Route::get('/product/delete-product/{id}', [AdminProductController::class, 'delete']);

//từ đây bắt đầu là cho feature
Route::get('/feature', [AdminFeatureController::class, 'index']);
Route::get('/feature/feature-add', [AdminFeatureController::class, 'create']);
Route::post('/feature/create', [AdminFeatureController::class, 'store']);
Route::get('/feature/feature-edit/{id}', [AdminFeatureController::class, 'edit']);
Route::post('/feature/feature-update/{id}', [AdminFeatureController::class, 'update']);
Route::get('/feature/feature-delete/{id}', [AdminFeatureController::class, 'delete']);


//từ đây bắt đầu là cho category
Route::get('/category', [AdminCategoryController::class, 'category_show']);
Route::get('/category/category-add', [AdminCategoryController::class, 'create']);
Route::post('/category/create', [AdminCategoryController::class, 'store']);
Route::get('/category/category-edit/{id}', [AdminCategoryController::class, 'edit']);
Route::post('/category/category-update/{id}', [AdminCategoryController::class, 'update']);
Route::get('/category/category-delete/{id}', [AdminCategoryController::class, 'delete']);


// ---------------- route cho phần giao diện khách hàng ---------------------
Route::get('/', [PageHomeController::class, 'index'])->name('home');
Route::get('/shop', [PageHomeController::class, 'shop'])->name('shop');
Route::get('/Danh-muc/{slug}', [PageCategoryProductController::class, 'product_by_category'])->name('product_by_category');

Route::get('/product-detail/{product_slug}', [PageProductController::class, 'product_detail'])->name('product_detail');

//search
Route::post('/search', [PageHomeController::class, 'search'])->name('search');
Route::post('/autocomplate-ajax', [PageHomeController::class, 'search_auto_complete']);

//cart
Route::post('/add-to-cart', [PageOrderController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/show-cart', [PageOrderController::class, 'show_cart'])->name('show_cart');
Route::post('/update-cart-qty',  [PageOrderController::class, 'update_cart_qty'])->name('update_cart_qty');
Route::get('/delete-cart/{rowId}',  [PageOrderController::class, 'delete_cart'])->name('delete_cart');
Route::post('/order', [PageOrderController::class, 'order']);

//auth
Route::get('/register',  [PageCustomerController::class, 'register_page'])->name('register_page');
Route::post('/register-post',  [PageCustomerController::class, 'register_post'])->name('register_post');
Route::get('/login',  [PageCustomerController::class, 'login_page'])->name('login_page');
Route::post('/login_post',  [PageCustomerController::class, 'login_post'])->name('login_post');
Route::get('/logout',  [PageCustomerController::class, 'logout'])->name('logout');

//rating
Route::post('/insert-rating', [PageOrderController::class, 'insert_rating']);