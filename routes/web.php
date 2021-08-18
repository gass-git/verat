<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\http\Controllers\PostController;
use App\Http\Controllers\DashboardController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home_sortby={field}', [HomeController::class, 'sortby']);

Route::get('/home_topic={field}',[HomeController::class, 'show_topic']);

Route::get('/show_bookmarks', [HomeController::class, 'show_bookmarks']);

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth','admin');

Route::post('/bookmark', [HomeController::class, 'bookmark']);

Route::post('/check_card', [HomeController::class, 'check_card']);


Route::post('/post_comment={post_id}', [PostController::class, 'post_comment']);

Route::post('/create_post', [PostController::class, 'insert'])->middleware('auth','admin');

Route::post('/upload_image', [PostController::class, 'upload_image'])->middleware('auth','admin');

Route::post('/delete_image', [PostController::class, 'delete_image'])->middleware('auth','admin');

Route::post('/like_post', [PostController::class, 'like_post']);

Route::post('/check_post', [PostController::class, 'check_post']);



Route::post('/like_comment',[PostController::class, 'like_comment'])->middleware('auth','admin');

Route::get('/post', [PostController::class, 'post_form'])->middleware('auth','admin');

Route::get('/post={post_id}',[PostController::class, 'show']);

Auth::routes();


