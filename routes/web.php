<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Pages
Route::get('/', function() {
    return view('index');
});

Route::get('/about', function() { 
    return view('about');
});

Route::get('/projects', [ProjectController::class, 'projects']);
Route::get('/projects/{prac}', [ProjectController::class, 'details']);
Route::get('/categories/{category:slug}', [ProjectController::class, 'listByCategory']);

// Register
Route::get('/register', [RegisterUserController::class, 'create'])->middleware('guest'); 
Route::post('/register', [RegisterUserController::class, 'store'])->middleware('guest'); 

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest'); 
Route::post('/login', [SessionController::class, 'store'])->middleware('guest'); 

// Logout
Route::get('/logout', [SessionController::class, 'logout'])->middleware('auth'); 

// Admin

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
    
    // project
    Route::get('/admin/project/create', [AdminController::class, 'create'])->middleware('admin');
    Route::post('/admin/project/create', [AdminController::class, 'store'])->middleware('admin');
    Route::get('/admin/project/{project}/edit', [AdminController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/project/{project}/edit', [AdminController::class, 'update'])->middleware('admin');
    Route::delete('/admin/project/{project}/delete', [AdminController::class, 'destroy'])->middleware('admin');

    //user
    Route::get('/admin/user/create', [UserController::class, 'create'])->middleware('admin');
    Route::post('/admin/user/create', [UserController::class, 'store'])->middleware('admin');
    Route::get('/admin/user/{user}/edit', [UserController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/user/{user}/edit', [UserController::class, 'update'])->middleware('admin');
    Route::delete('/admin/user/{user}/delete', [UserController::class, 'destroy'])->middleware('admin');

    //category
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->middleware('admin');
    Route::post('/admin/category/create', [CategoryController::class, 'store'])->middleware('admin');
    Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/category/{category}/edit', [CategoryController::class, 'update'])->middleware('admin');
    Route::delete('/admin/category/{category}/delete', [CategoryController::class, 'destroy'])->middleware('admin');

    //tag
    Route::get('/admin/tag/create', [TagController::class, 'create'])->middleware('admin');
    Route::post('/admin/tag/create', [TagController::class, 'store'])->middleware('admin');
    Route::get('/admin/tag/{tag}/edit', [TagController::class, 'edit'])->middleware('admin');
    Route::patch('/admin/tag/{tag}/edit', [TagController::class, 'update'])->middleware('admin');
    Route::delete('/admin/tag/{tag}/delete', [TagController::class, 'destroy'])->middleware('admin');
});



// Fallback
Route::fallback(function() {

    // Set a flash message
    session()->flash('error','Requested page not found.  Home you go.');

    // Redirect to /
    return redirect('/');
});

// JSON
Route::get('/api/projects', [ProjectController::class, 'getProjectsJSON']);
Route::get('/api/categories', [CategoryController::class, 'getCategoriesJSON']);
Route::get('/api/tags', [TagController::class, 'getTagsJSON']);
