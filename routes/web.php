<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog-detail/{slug}/{id}', [HomeController::class, 'blogDetail']);
Route::get('/category/{slug}/{id}', [HomeController::class, 'category_posts']);
Route::post('/save-comment/{slug}/{id}', [HomeController::class, 'save_comment']);
// Profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'store_post']);
Route::post('/profile', [ProfileController::class, 'update_profile']);



//Admin Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'submit_login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

//Admin Category
Route::get('/admin/category', [CategoryController::class, 'index']);
Route::get('/admin/add-category', [CategoryController::class, 'add_category']);
Route::post('/admin/category', [CategoryController::class, 'store_category']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit_category']);
Route::post("admin/category/edit/{id}", [CategoryController::class, 'update_category']);
Route::get("admin/category/delete/{id}", [CategoryController::class, 'delete_category']);

//Admin Post
Route::resource('admin/post', PostController::class);
Route::get('admin/post/{id}/delete', [PostController::class, 'destroy']);

//Admin Users
Route::get('/admin/users', [AdminController::class, 'users']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
