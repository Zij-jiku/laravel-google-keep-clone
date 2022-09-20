<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleKeepController;

Route::get('/', [GoogleKeepController::class, 'index'])->name('index');
Route::resource('categories', CategoryController::class)->only('index', 'create' , 'store' , 'destroy');
Route::resource('google-keep' , GoogleKeepController::class);
Route::get('category/search/{id}', [GoogleKeepController::class, 'categorySearch']);


