<?php

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
    return view('blogs');
});

Route::get('/blogs/{blog}', function ($slug) {
    $path = __DIR__ . "/../resources/blogs/$slug.html";
    if (!file_exists($path)) {
        // dd("hit");
        // abort(404);
        // return redirect('/');
    }
    $blog = cache()->remember("posts.$slug", now()->addW(), function () use ($path) {
        var_dump('file get content');
        return file_get_contents($path);
    });
    return view('blog', ['blog' => $blog]);
})->where('blog', '[A-z\d\-_]+');

// ->whereAlpha('blog');
// ->whereNumber('blog');
// ->whereAlphaNumeric('blog');
