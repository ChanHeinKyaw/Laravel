<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // DB::listen(function($query){
    //     Log::info($query->sql);
    // });
    return view('blogs', ['blogs' => Blog::all()]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', ['blog' => $blog]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    // return view('blogs', ['blogs' => $category->blogs->load('category','author')]);
    return view('blogs', ['blogs' => $category->blogs]);
});

Route::get('/users/{user}', function (User $user) {
    // return view('blogs', ['blogs' => $user->blogs->load('category','author')]);
    return view('blogs', ['blogs' => $user->blogs]);
});

