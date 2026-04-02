<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\DashboardController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/skills', [HomeController::class, 'skills'])->name('skills');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Admin Auth Routes
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'loginPerform'])->name('login.perform');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Protected Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [DashboardController::class, 'profileIndex'])->name('profile.index');
    Route::put('/profile', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    
    // About
    Route::get('/about', [DashboardController::class, 'aboutIndex'])->name('about.index');
    Route::put('/about', [DashboardController::class, 'aboutUpdate'])->name('about.update');
    
    // Skills
    Route::get('/skills', [DashboardController::class, 'skillsIndex'])->name('skills.index');
    Route::post('/skills', [DashboardController::class, 'skillStore'])->name('skills.store');
    Route::put('/skills/{skill}', [DashboardController::class, 'skillUpdate'])->name('skills.update');
    Route::delete('/skills/{skill}', [DashboardController::class, 'skillDelete'])->name('skills.delete');
    
    // Tech Stacks
    Route::get('/tech-stacks', [DashboardController::class, 'techStacksIndex'])->name('tech-stacks.index');
    Route::post('/tech-stacks', [DashboardController::class, 'techStackStore'])->name('tech-stacks.store');
    Route::put('/tech-stacks/{techStack}', [DashboardController::class, 'techStackUpdate'])->name('tech-stacks.update');
    Route::delete('/tech-stacks/{techStack}', [DashboardController::class, 'techStackDelete'])->name('tech-stacks.delete');
    
    // Education
    Route::get('/education', [DashboardController::class, 'educationIndex'])->name('education.index');
    Route::post('/education', [DashboardController::class, 'educationStore'])->name('education.store');
    Route::put('/education/{education}', [DashboardController::class, 'educationUpdate'])->name('education.update');
    Route::delete('/education/{education}', [DashboardController::class, 'educationDelete'])->name('education.delete');
    
    // Experiences
    Route::get('/experiences', [DashboardController::class, 'experiencesIndex'])->name('experiences.index');
    Route::post('/experiences', [DashboardController::class, 'experienceStore'])->name('experiences.store');
    Route::put('/experiences/{experience}', [DashboardController::class, 'experienceUpdate'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [DashboardController::class, 'experienceDelete'])->name('experiences.delete');
    
    // Projects
    Route::get('/projects', [DashboardController::class, 'projectsIndex'])->name('projects.index');
    Route::post('/projects', [DashboardController::class, 'projectStore'])->name('projects.store');
    Route::put('/projects/{project}', [DashboardController::class, 'projectUpdate'])->name('projects.update');
    Route::delete('/projects/{project}', [DashboardController::class, 'projectDelete'])->name('projects.delete');
    
    // Social Links
    Route::get('/social-links', [DashboardController::class, 'socialLinksIndex'])->name('social-links.index');
    Route::post('/social-links', [DashboardController::class, 'socialLinkStore'])->name('social-links.store');
    Route::put('/social-links/{socialLink}', [DashboardController::class, 'socialLinkUpdate'])->name('social-links.update');
    Route::delete('/social-links/{socialLink}', [DashboardController::class, 'socialLinkDelete'])->name('social-links.delete');
});

