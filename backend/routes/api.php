<?php

use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Slider api
Route::get('/sliders', [SliderController::class, 'ApiAllSlider']);

// Service api
Route::get('/services', [ServiceController::class, 'ApiAllService']);
