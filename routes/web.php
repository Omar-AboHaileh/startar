<?php

use App\Http\Controllers\Admin\SecondController;
use App\Http\Controllers\Front\FirstController;
use App\Http\Controllers\ThirdController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;
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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/test1', function () {
  return 'welcome';
});

Route::get('/test2/{id}', function ($id) {
  return $id;
});


Route::get('/test3/{id?}', function () {
  return 'welcome';
});


Route::get('/show-number/{id}', function ($id) {
  return $id;
})->name('a');

Route::get('/show-string/{id}', function () {
  return 'welcome';
})->name('b');


// <div class="links">  
//      <a href="{{route('a',50)}}"> a </a>
//      <a href="{{route('b'}}"> b </a>
// </div>





Route::group(['prefix' => 'users','middleware' => 'auth'] , function() {

  Route::get('/', function () {
    return 'work';
  });  
  Route::get('/show', [UserController::class, 'show']);
  Route::post('/create', [UserController::class, 'create']);
  Route::delete('/delete', [UserController::class, 'delete']);
  Route::put('/update', [UserController::class, 'update']);
  Route::get('/index', [UserController::class, 'index']);

  Route::get('/index', [FirstController::class, 'index']);

});


Route::get('check', function () {
  return 'middleware';
})->middleware('auth');

//----------------------------------------------------------------------------

//Route::get('/a',[SecondController::class],'index' )->namespace('Admin');

Route::group(['namespace' => 'Admin'] , function() {

  Route::get('/in',[SecondController::class,'index' ]);
});

Route::get('/getMethod',[UserController::class,'Method']);


Route::get('/landing', function () {
  return view('landing');
});
