<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

// กำหนดเส้นทางสำหรับการแสดงแบบฟอร์มและประมวลผลการส่ง
Route::get('/mycontroller', [MyController::class, 'myfunction']);
Route::post('/mycontroller', [MyController::class, 'myfunction']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{id?}',
    function($var1="") {
    return "<h1>Hello World $var1</h1>";
});