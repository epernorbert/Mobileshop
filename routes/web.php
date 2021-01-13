<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\OrderController;


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

// Home
Route::get('/', [HomeController::class , 'index'])
	->name('home.page');



// Cart
Route::get('/cart', [CartController::class , 'index'])	
	->name('cart.page')
	->middleware('auth');

Route::post('/cart/quantity-add', [CartController::class , 'quantityAdd'])	
	->name('cart.quantityAdd')
	->middleware('auth');	

// Add to cart
Route::get('/add-to-cart/{id}', [CartController::class , 'addToCart'])
	->name('add.toCart')
	->middleware('auth');

// Remove from cart
Route::post('/cart/delete/', [CartController::class , 'removeItem'])	
	->name('remove.item')
	->middleware('auth');	



// Billing
Route::get('/cart/billing', [BillingController::class , 'index'])	
	->name('billing.page')
	->middleware('auth');

Route::post('/cart/billing/save', [BillingController::class , 'saveBillingData'])	
	->name('billingData.save')
	->middleware('auth');

Route::post('/cart/billing/update', [BillingController::class , 'updateBillingData'])	
	->name('billingData.update')
	->middleware('auth');	



// Order
Route::get('/cart/order', [OrderController::class , 'index'])	
	->name('order.page')
	->middleware('auth');



// Search
Route::get('/search', [SearchController::class , 'index'])
	->name('search.page');

Route::post('/search/result', [SearchController::class , 'searchMobile'])
	->name('search.mobile');	



// Register
Route::get('/register', [RegisterController::class, 'index'])
	->name('register.page')
	->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])
	->name('register.user');



// Login & logout
Route::get('/login', [LoginController::class , 'index'])
	->name('login.page')
	->middleware('guest');

Route::post('/login', [LoginController::class , 'sign_in'])
	->name('signIn.user');

Route::post('/logout', [LoginController::class , 'logout'])
	->name('logout.user');



// Show mobile
Route::get('/mobile/{id}', [MobileController::class, 'index'])
	->name('mobile.page');	



// Write comment if logged in
Route::post('/mobile/{id}/comment', [CommentController::class, 'write_comment'])
	->name('write.comment');




// Admin route
Route::middleware('Admin', 'auth')->group( function() {

	// Admin
	Route::get('/admin', [AdminController::class , 'index'])
		->name('admin.page');	



	// Mobile	
	Route::get('/admin/upload', [UploadController::class, 'index'])
		->name('upload.page');

	// Upload
	Route::post('/admin/upload/mobile', [MobileController::class, 'upload_mobile'])
		->name('upload.mobile');

	// Edit
	Route::get('/admin/edit/{id}', [MobileController::class, 'edit_mobile'])
		->name('edit.mobile');

	// Delete
	Route::post('/admin/delete/{id}', [MobileController::class, 'delete_mobile'])
		->name('destroy.mobile');

	// Update
	Route::post('/admin/edit/update', [MobileController::class, 'update_mobile'])
		->name('update.mobile');



	// Comment
	// Delete
	Route::post('/admin/edit/{id}/delete', [CommentController::class, 'delete_comment'])
		->name('destroy.comment');



	// Users
	// Read
	Route::get('/admin/user/edit/{id}', [UserController::class, 'read_user'])
		->name('edit.user');

	// Update
	Route::post('/admin/user/edit/{id}/update', [UserController::class, 'update_user'])
		->name('update.user');

	// Delete
	Route::post('/admin/user/delete/{id}', [UserController::class, 'delete_user'])
		->name('destroy.user');
	
});


		