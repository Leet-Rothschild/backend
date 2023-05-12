<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\UserResourceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;



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

//Public APIs
Route::post('/login', [AuthController::class, 'login'])->name('user.login'); 
Route::post('/user',  [AuthController::class, 'store'])->name('user.store');  

//Private APIs
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']); 

    Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel',           'index'); 
    Route::get('/carousel/{id}',      'show');
    Route::post('/carousel',          'store');
    Route::put('/carousel/{id}',      'update');
    Route::delete('/carousel/{id}',   'destroy'); 
});


Route::controller(UserResourceController::class)->group(function () {
    Route::get('/user',             'index'); 
    Route::get('/user/{id}',        'show');
    Route::post('/user',            'store')->name('user.store');
    Route::delete('/user/{id}',     'destroy');  
    Route::put('/user/{id}',    'update')->name('user.update');
    Route::put('/user/image/{id}',    'image')->name('user.image');

});



// User Specific APIs
Route::get('/profile/show',      [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile/image',     [ProfileController::class, 'image'])->name('profile.image');


});
 

// Route::get('/messages', [MessagesController::class, 'index']); 
// Route::get('/messages/{id}', [MessagesController::class, 'show']);
// Route::delete('/messages/{id}', [MessagesController::class, 'destroy']);