<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\AuthController;


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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout','logout'); 
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel',           'index'); 
    Route::get('/carousel/{id}',      'show');
    Route::post('/carousel',          'store');
    Route::put('/carousel/{id}',      'update');
    Route::delete('/carousel/{id}',   'destroy'); 
});

Route::get('/carousel', [CarouselItemsController::class, 'index']); 
Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);
Route::post('/carousel', [CarouselItemsController::class, 'store']);
Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);
Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);  

// Route::get('/user', [UserResourceController::class, 'index']); 
// Route::get('/user/{id}', [UserResourceController::class, 'show']);
// Route::post('/user', [UserResourceController::class, 'store'])->name('user.store');
// Route::delete('/user/{id}', [UserResourceController::class, 'destroy']);  
// Route::put('/carousel/{id}', [UserResourceController::class, 'update'])->name('user.update');


Route::get('/messages', [MessagesController::class, 'index']); 
Route::get('/messages/{id}', [MessagesController::class, 'show']);
Route::delete('/messages/{id}', [MessagesController::class, 'destroy']);

