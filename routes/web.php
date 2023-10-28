<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;

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

Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);

Route::post('/blogs/{blog:slug}/comments', [CommentController::class,'store']);

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class,'subscriptionHandler']);

// Route::get('/categories/{category:slug}', function (Category $category) {
//     // return view('blogs', ['blogs' => $category->blogs->load('category','author')]);
//     return view('blogs', ['blogs' => $category->blogs,'categories' => Category::all(), 'currentCategory' => $category]);
// });

// Route::get('/users/{user:username}', function (User $user) {
//     // return view('blogs', ['blogs' => $user->blogs->load('category','author')]);
//     return view('blogs', [
//         'blogs' => $user->blogs,
//         // 'categories' => Category::all()
//     ]);
// });


//admin routes
// Route::get('/admin/dashboard',[AdminBlogController::class,'index'])->middleware('can:admin');
// Route::get('/admin/blogs/create',[AdminBlogController::class,'create'])->middleware('can:admin');
// Route::post('/admin/blogs/store',[AdminBlogController::class,'store'])->middleware('can:admin');
// Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy'])->middleware('can:admin');
// Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit'])->middleware('can:admin');
// Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update'])->middleware('can:admin');

//admin routes with middleware Group
Route::middleware('can:admin')->group(function(){
    Route::get('/admin/dashboard',[AdminBlogController::class,'index']);
    Route::get('/admin/blogs/create',[AdminBlogController::class,'create']);
    Route::post('/admin/blogs/store',[AdminBlogController::class,'store']);
    Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy']);
    Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update',[AdminBlogController::class,'update']);
});