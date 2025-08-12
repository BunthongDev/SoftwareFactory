<?php

use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\TopNavbarController;
use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Models\Service;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout'); // This route handles the admin logout functionality
Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login'); // This route handles the admin login functionality

Route::get('verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form'); // This route shows the verification form
Route::post('verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify'); // This route verifies the code entered by the user



// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/user/password/update', [ProfileController::class, 'PasswordUpdate'])->name('user.password.update');

    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Slider Routes
Route::middleware('auth')->group(function () {
    // SliderController routes
    Route::controller(SliderController::class)->group(function (){
        Route::get('/all/slider', 'AllSlider')->name('all.slider'); // This route displays all sliders
        Route::get('/add/slider', 'AddSlider')->name('add.slider'); // this route shows the add slider form
        Route::post('/store/slider', 'StoreSlider')->name('store.slider'); // this route stores the new slider
        Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider'); // this route shows the edit slider form
        Route::post('/update/slider/{id}', 'UpdateSlider')->name('update.slider'); // this route updates the slider
        Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider'); // this route deletes the slider
    });

    // SeviceController routes, this section handles the service management routes
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/all/service', 'AllService')->name('all.service'); // This route displays all services
        Route::get('/add/service', 'AddService')->name('add.service'); // this route shows the add service form
        Route::post('/store/service', 'StoreService')->name('store.service'); // this route stores the new service
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service'); // this route shows the edit service form
        Route::post('/update/service/{id}', 'UpdateService')->name('update.service'); // this route updates the service
        Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service'); // this route deletes the service
    });

    // CaseStudyController routes, this section handles the case study management routes
    Route::controller(CaseStudyController::class)->group(function () {
        Route::get('/all/case-study', 'AllCaseStudy')->name('all.casestudy'); // This route displays all case studies
        Route::get('/add/case-study', 'AddCaseStudy')->name('add.casestudy'); // this route shows the add case study form
        Route::post('/store/case-study', 'StoreCaseStudy')->name('store.casestudy'); // this route stores the new case study
        Route::get('/edit/case-study/{id}', 'EditCaseStudy')->name('edit.casestudy'); // this route shows the edit case study form
        Route::post('/update/case-study/{id}', 'UpdateCaseStudy')->name('update.casestudy'); // this route updates the case study
        Route::get('/delete/case-study/{id}', 'DeleteCaseStudy')->name('delete.casestudy'); // this route deletes the case study
    });

    // TopNavbarController routes, this section handles the top navbar management routes 
    Route::controller(TopNavbarController::class)->group(function () {
        // Route to display the settings page
        Route::get('/top-navbar/settings', 'EditTopNav')->name('edit.topnav');

        // Route to handle the form submission and update the settings
        Route::post('/top-navbar/update/{id}', 'UpdateTopNav')->name('update.topnav');
    });


    // Route to display the menu management page
    Route::controller(MenuController::class)->group(function () {
        // Route to display the menu management page
        Route::get('/menu/settings', 'EditMenu')->name('edit.menu.settings');

        // Route to handle the form submission and update all settings
        Route::post('/menu/update', 'UpdateMenuSettings')->name('update.menu.settings');
    });

    // TestimonialController routes using the resourceful convention
    Route::resource('testimonial', TestimonialController::class)->middleware(['auth']);
    
});
