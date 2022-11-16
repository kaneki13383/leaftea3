<?php

use App\Http\Controllers\DeleteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserOutputController;

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



Route::get('/products', [ProductController::class, 'all']);
Route::get('/users', [UserOutputController::class, 'all']);
Route::delete('/delete/{id}', [DeleteUser::class, 'delete']);