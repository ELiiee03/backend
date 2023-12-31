<?php

use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', [CarouselItemsController::class, 'index']);
Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);
Route::post('carousel', [CarouselItemsController::class, 'store']);
Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);
Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);

Route::get('/user', [UsersController::class, 'index']);
Route::get('/user/{id}', [UsersController::class, 'show']);
Route::post('user', [UsersController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::put('/user/email/{id}', [UsersController::class, 'email'])->name('user.email');
Route::put('/user/password/{id}', [UsersController::class, 'password'])->name('user.password');
Route::delete('/user/{id}', [UsersController::class, 'destroy']);

Route::get('/message', [MessageController::class, 'index']);
Route::get('/message/{id}', [MessageController::class, 'show']);
Route::delete('/message/{id}', [MessageController::class, 'destroy']);
Route::post('message', [MessageController::class, 'store']);