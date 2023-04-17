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
    $blogs = Blog::latest();
    if(request('search')){
        $blogs = $blogs->where('title','LIKE', '%' . request('search'). '%');
    }
    return view('blogs', ['blogs' => $blogs->get(), 'categories' => Category::all()]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', ['blog' => $blog,'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    // return view('blogs', ['blogs' => $category->blogs->load('category','author')]);
    return view('blogs', ['blogs' => $category->blogs,'categories' => Category::all(), 'currentCategory' => $category]);
});

Route::get('/users/{user:username}', function (User $user) {
    // return view('blogs', ['blogs' => $user->blogs->load('category','author')]);
    return view('blogs', ['blogs' => $user->blogs,'categories' => Category::all()]);
});

