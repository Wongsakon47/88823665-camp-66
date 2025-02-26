<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckLogin;

Route::middleware([CheckLogin::class])->group(function(){
    Route::get('/users',[UserController::class, 'index']);
    Route::get('/user',[UserController::class, 'edit']);
    Route::put('/user',[UserController::class, 'edit_action']);
    Route::delete('/user',[UserController::class, 'delete']);
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'add_product'])->name('product.store');

Route::get('/',[HomeController::class, 'index'])->middleware([CheckLogin::class]);

Route::get('/login',
    [LoginController::class, 'index']);
Route::post('/login',
    [LoginController::class, 'login']);
    Route::get('/logout', function(){
        session()->forget('user');
        session()->flush();
        return redirect('/login');
    });

Route::get('/register',
    [RegisterController::class, 'index']);
Route::post('/register',
    [RegisterController::class, 'create']);
Route::get('/home',
    [HomeController::class, 'index']);
Route::get('/',
    [HomeController::class, 'index']);

Route::get('/users',
    [UserController::class, 'index']);
Route::get('/users/edit/{id}',
    [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit',
    [UserController::class, 'edit_action'])->name('users.update');
Route::post('/users/delete',
    [UserController::class, 'delete'])->name('users.delete');

Route::get('/mycontroller/{id?}',
    [MyController::class, 'myfunction']);
Route::post('/mycontroller/{id?}',
    [MyController::class, 'MYFUNCTION']);

Route::get('/error404', function (){
    abort(404, 'Internal Not Found');
});
Route::get('/error500', function (){
    abort(500, 'Internal Server Error');
});

Route::get('/hello/{id?}',
    function ($val="") {
     return "<h1>Hello World $val</h1>";
});

