<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\AboutMeController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\TechStackController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\ExperienceController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\SocialLinkController;
use App\Http\Controllers\API\PortfolioController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/portfolio', [PortfolioController::class, 'index']);

// Public view routes
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/about-me', [AboutMeController::class, 'index']);
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/skills/{skill}', [SkillController::class, 'show']);
Route::get('/tech-stacks', [TechStackController::class, 'index']);
Route::get('/tech-stacks/{tech_stack}', [TechStackController::class, 'show']);
Route::get('/education', [EducationController::class, 'index']);
Route::get('/education/{education}', [EducationController::class, 'show']);
Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/experiences/{experience}', [ExperienceController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
Route::get('/social-links', [SocialLinkController::class, 'index']);
Route::get('/social-links/{social_link}', [SocialLinkController::class, 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Portfolio management routes
    Route::apiResource('profile', ProfileController::class)->except(['index', 'show']);
    Route::apiResource('about-me', AboutMeController::class)->except(['index', 'show']);
    Route::apiResource('skills', SkillController::class)->except(['index', 'show']);
    Route::apiResource('tech-stacks', TechStackController::class)->except(['index', 'show']);
    Route::apiResource('education', EducationController::class)->except(['index', 'show']);
    Route::apiResource('experiences', ExperienceController::class)->except(['index', 'show']);
    Route::apiResource('projects', ProjectController::class)->except(['index', 'show']);
    Route::apiResource('social-links', SocialLinkController::class)->except(['index', 'show']);
});
