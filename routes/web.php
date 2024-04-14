<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DragDropController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('drag-drop-form', [DragDropController::class, 'form']);
Route::post('uploadFiles', [DragDropController::class, 'uploadFiles']);
