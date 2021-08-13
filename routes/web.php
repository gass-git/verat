<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\http\Controllers\PostController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home_sortby={field}', [HomeController::class, 'sortby']);

Route::get('/home_topic={field}',[HomeController::class, 'show_topic']);


Route::post('/post_comment={post_id}', [PostController::class, 'post_comment']);

Route::post('/create_post', [PostController::class, 'insert']);

Route::post('/like_post',[PostController::class, 'like_post']);

Route::post('/like_comment',[PostController::class, 'like_comment']);

Route::get('/post', function () {
    return view('layouts/create_post');
});

Route::get('/post={post_id}',[PostController::class, 'show']);

Auth::routes();


