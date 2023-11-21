<?php

use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\AuthController;
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

// so e remove na ni sya
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Public APIs
Route::post('/login', [AuthController::class, 'login'])->name('user.login');;
// forda register ni sya nga api
Route::post('user', [UsersController::class, 'store'])->name('user.store');


// routes forda carouselitems nga nasud nas sanctum which means protected na sya
// Private APIs
Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/user',             'index');
        Route::get('/carousel/{id}',    'show');
        Route::post('carousel',         'store');
        Route::put('/carousel/{id}',    'update');
        Route::delete('/carousel/{id}', 'destroy');
    });
    // users route
    Route::controller(UsersController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::put('/user/image/{id}',      'image')->name('user.image');
        Route::delete('/user/{id}',         'destroy');
    });
    // message routes
    Route::controller(MessageController::class)->group(function () {
        Route::get('/message',          'index');
        Route::get('/message/{id}',     'show');
        Route::delete('/message/{id}',  'destroy');
        Route::post('message',          'store');
    });

    Route::post('/logout', [AuthController::class, 'logout']);

});