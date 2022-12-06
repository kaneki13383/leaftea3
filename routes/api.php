<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\DeleteUser;
use App\Http\Controllers\LoadAvatarController;
use App\Http\Controllers\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserOutputController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:sanctum'], function(){
//     Route::post('/load-avatar', '\App\Http\Controllers\LoadAvatarController');
// });

// Route::post('/register', [RegisterController::class, 'registerUser']);
Route::get('/products', [ProductController::class, 'all']);
Route::get('/products/{id}',[ProductController::class, 'index']);
Route::get('/view/{id}', [ProductController::class, 'get']);
Route::get('/users', [UserOutputController::class, 'all']);
Route::delete('/delete/{id}', [DeleteUser::class, 'delete']);
Route::post('/add_product', [AddProductController:: class, 'addproduct']);
Route::delete('/delete_product/{id}', [DeleteProductController::class, 'delete']);
Route::post('/review', [ReviewController::class, 'addreview']);
Route::get('/getreview', [ReviewController::class, 'getreview']);
Route::delete('/deletereview/{id}', [ReviewController::class, 'deletereview']);
Route::post('/delavatar', [LoadAvatarController::class, 'delavatar']);
Route::post('/addproduct', [CartController::class, 'addCart']);
Route::post('/getproductcart', [CartController::class, 'getProduct']);
Route::post('/product', [CartController::class, 'product']);
Route::delete('/deletecart/{id}', [CartController::class, 'delcart']);
Route::post('/addOrder', [OrdersController::class, 'add_order']);
Route::post('/output_order', [OrdersController::class, 'output_order']);
Route::post('/output_all_order', [OrdersController::class, 'output_all_order']);
Route::post('/find_user', [UserOutputController::class, 'find_user']);
Route::post('/saveEdit', [ProductController::class, 'editProduct']);