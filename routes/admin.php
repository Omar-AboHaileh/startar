

<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return 'hello-admin';
});

Route::namespace('Front')->group(function(){
  // all route only access controller or methods in folder name Front
    Route::get('/users',[UserController::class ,'shouldAdminName']);
    
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
    // Route::get('/index', [UserController::class , 'index']);
});
