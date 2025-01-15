<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

// กำหนดเส้นทางสำหรับการแสดงแบบฟอร์มและประมวลผลการส่ง
Route::get('/mycontroller', [MyController::class, 'myfunction']);
Route::post('/mycontroller', [MyController::class, 'myfunction']);
