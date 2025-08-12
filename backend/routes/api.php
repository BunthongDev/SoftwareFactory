<?php

use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\TopNavbarController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Slider api
Route::get('/sliders', [SliderController::class, 'ApiAllSlider']);

// Service api
Route::get('/services', [ServiceController::class, 'ApiAllService']);

// Case Study api
Route::get('/case-studies', [CaseStudyController::class, 'ApiAllCaseStudy']);

// Top Navbar API
Route::get('/top-navbar-settings', [TopNavbarController::class, 'ApiTopNav']);

// Menu Settings API
Route::get('/menu-data', [MenuController::class, 'ApiMenu']);

// Testimonial API
Route::get('/testimonials', [TestimonialController::class, 'ApiAllTestimonials']);

// Our's Client API
Route::get('/clients', [ClientController::class, 'ApiAllClients']);



