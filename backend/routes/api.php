<?php

use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\AdController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
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

// Blog API (This route will provide the public API endpoint that Next.js frontend will use to fetch the blog post data.)
Route::get('/blogs', [BlogController::class, 'ApiAllBlogs']); // for display all blogs in blog menu
Route::get('/blogs/{slug}', [BlogController::class, 'ApiShowBlog']); // The route now expects a {slug} parameter instead of {id}
Route::get('/related-blogs', [BlogController::class, 'ApiRelatedBlogs']); // for related blog on reading page
Route::get('/latest-blogs', [BlogController::class, 'ApiLatestBlogs']); // latest blog display in homepage

// About Us API route
Route::get('/about-us', [AboutUsController::class, 'ApiAboutUsData']);

// For footer API endpoint
Route::get('/footer', [FooterController::class, 'ApiFooterData']);

// Contact us API endpoint
Route::get('/contact-us', [ContactController::class, 'ApiContactUsData']);

// Settings API endpoint
Route::get('/settings', [SettingController::class, 'ApiSiteSettings']);

// Blog Ads API endpoint
Route::get('/ads', [AdController::class, 'index']);
