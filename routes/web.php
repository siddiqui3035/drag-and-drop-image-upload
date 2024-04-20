<?php

use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/images', [ImageUploadController::class, 'index']);
Route::post('images/store', [ImageUploadController::class, 'store'])->name('images.store');
