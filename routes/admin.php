<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Admin\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('login','AdminAuthController@login');

Route::group(['prefix'=>'admin','namesapce'=>'Admin'], function(){
     config::set('auth.defines','admin');
   // Route::post('login', [AdminAuthController::class, 'login'])->name('login');
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'loginPost'])->name('login');

    // Route::post('login', [AdminAuthController::class, 'dologin'])->name('dologin');

     Route::group(['middleware' =>'admin'],function(){


    Route::get('/',function (){
        return view('admin.home');

     });
         Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

    });
});
