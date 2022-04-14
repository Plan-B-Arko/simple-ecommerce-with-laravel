<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdmindashboardController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDiscountController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RestuarantController;


/* Cutomer Controller */

Route::get('/', [HomeController::class, 'home'])->name('home');

// search with price
Route::post('search/food', [HomeController::class, 'search'])->name('search');

// account
Route::get('/account', [RegistrationController::class, 'account'])->name('account');
Route::post('/register', [RegistrationController::class, 'registration'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// authentication return

Route::get('/login', [RegistrationController::class, 'account'])->name('account');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::get('/product/category/{id}', [HomeController::class, 'product_category'])->name('product_category');

// single product
Route::get('/single/product/{id}', [HomeController::class, 'single_product'])->name('single_product');

// Dashboard category
Route::get('/dashboard/product/category/{id}', [DashboardController::class, 'dashboard_category'])->name('dashboard_category');

// Dashboard Single product
Route::get('dashboard/single/product/{id}', [DashboardController::class, 'dashboard_single_product'])->name('single_product');

// Dashboard search with price
Route::post('dashboard/search/food', [DashboardController::class, 'dashboard_search'])->name('dashboard_search');

// cart page
Route::get('dashboard/cart', [CartController::class, 'dashboard_cart'])->name('dashboard_cart');
Route::post('/dashboard/cart/update', [CartController::class, 'cart_update'])->name('cart_update');
Route::get('/cart/item/delete/{id}', [CartController::class, 'cart_item_delete'])->name('cart_item_delete');

// checkout page
Route::get('dashboard/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'product_checkout'])->name('product_checkout');

// order list
Route::get('order/list', [CheckoutController::class,'order_list'])->name('order_list');
Route::get('/product/delivered/{id}', [CheckoutController::class,'product_delivered'])->name('product_delivered');

// food review
Route::get('/dashboard/food/review', [CheckoutController::class, 'food_review'])->name('food_review');
Route::post('food/review', [CheckoutController::class, 'single_food_review'])->name('single_food_review');

// Restaurant
Route::get('/top/restaurant', [DashboardController::class, 'top_restaurant'])->name('top_restaurant');

/* Admin Controller */

// Admin Dashboard
Route::get('/royalfood/admin', [AdminHomeController::class, 'adminhome'])->name('adminhome');
Route::post('/admin/login', [AdminHomeController::class, 'admin_login'])->name('admin_login');
Route::get('/admin/dashboard', [AdmindashboardController::class, 'admindashboard'])->name('admindashboard');
//Route::get('/login', [AdminHomeController::class, 'adminhome'])->name('adminhome');
Route::get('/admin/logout', [AdmindashboardController::class, 'admin_logout'])->name('admin_logout');

// Category
Route::get('/admin/category/list', [AdminCategoryController::class, 'category'])->name('category');
Route::get('/admin/add/category', [AdminCategoryController::class, 'add_category'])->name('add_category');
Route::get('/admin/edit/category/{id}', [AdminCategoryController::class, 'edit_category'])->name('edit_category');
Route::post('/admin/edit/category/process/{id}', [AdminCategoryController::class, 'edit_process'])->name('edit_process');
Route::post('/admin/category/process', [AdminCategoryController::class, 'category_process'])->name('category_process');
Route::post('/admin/category/inactive', [AdminCategoryController::class, 'category_active'])->name('category_active');
Route::post('/admin/category/active', [AdminCategoryController::class, 'category_inactive'])->name('category_inactive');
Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'category_delete'])->name('category_delete');


// discount
Route::get('/admin/discount/list', [AdminDiscountController::class, 'discount'])->name('discount');
Route::get('/admin/add/discount', [AdminDiscountController::class, 'add_discount'])->name('add_discount');
Route::post('/admin/discount/process', [AdminDiscountController::class, 'discount_process'])->name('discount_process');
Route::get('/admin/edit/discount/{id}', [AdminDiscountController::class, 'edit_discount'])->name('edit_discount');
Route::post('/admin/edit/discount/process/{id}', [AdminDiscountController::class, 'discount_edit_process'])->name('discount_edit_process');
Route::get('/admin/discount/delete/{id}', [AdminDiscountController::class, 'discount_delete'])->name('discount_delete');


//Product
Route::get('/admin/product/list', [AdminProductController::class, 'product'])->name('product');
Route::get('/admin/add/product/', [AdminProductController::class, 'add_product'])->name('add_product');
Route::post('/admin/add/product/process', [AdminProductController::class, 'product_process'])->name('product_process');
Route::get('/admin/edit/product/{id}', [AdminProductController::class, 'edit_product'])->name('edit_product');
Route::post('/admin/edit/product/process/{id}', [AdminProductController::class, 'edit_process'])->name('edit_process');
Route::post('/admin/product/inactive', [AdminProductController::class, 'product_active'])->name('product_active');
Route::post('/admin/product/active', [AdminProductController::class, 'product_inactive'])->name('product_inactive');
Route::get('/admin/delete/product/{id}', [AdminProductController::class, 'product_remove'])->name('product_remove');

// Cart
Route::post('/product/cart', [CartController::class, 'cart'])->name('cart');

// Order manage
Route::get('/new/order/list', [AdminOrderController::class, 'new_order_list'])->name('new_order_list');
Route::get('order/confirm/{id}', [AdminOrderController::class, 'order_confirm'])->name('order_confirm');
Route::get('order/delivered/list', [AdminOrderController::class, 'order_delivered'])->name('order_delivered');

// Contact us
Route::get('/contactus', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/process', [ContactController::class, 'contact_process'])->name('contactus_process');

Route::get('/dashboard/contactus', [DashboardController::class, 'contact'])->name('contactus');
Route::post('/dashboard/contact/process', [DashboardController::class, 'contact_process'])->name('contact_process');

// About us page
Route::get('/aboutus', [ContactController::class, 'aboutus'])->name('about');

Route::get('dashboard/aboutus', [DashboardController::class, 'aboutus'])->name('aboutus');

// Admin contact replied
Route::get('admin/new/contact', [AdminDashboardController::class, 'contact_list'])->name('contact_list');
Route::get('replied/{id}', [AdminDashboardController::class, 'replied'])->name('replied');
Route::get('contact/replied/list', [AdminDashboardController::class, 'replied_list'])->name('replied_list');

// restaurant
Route::get('/admin/restaurant', [RestuarantController::class, 'restaurant'])->name('restaurant');
Route::get('/admin/add/restaurant', [RestuarantController::class, 'add_restaurant'])->name('add_restaurant');
Route::post('/admin/store/restaurant', [RestuarantController::class, 'store_restaurant'])->name('store_restaurant');
Route::get('/admin/delete/restaurant/{id}', [RestuarantController::class, 'delete_restaurant'])->name('delete_restaurant');
