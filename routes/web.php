<?php

use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/image-up', [ImageUploadController::class, 'index']);
Route::post('images/store', [ImageUploadController::class, 'store'])->name('images.store');
