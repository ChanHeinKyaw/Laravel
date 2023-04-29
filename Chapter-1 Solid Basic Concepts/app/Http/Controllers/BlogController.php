<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        // DB::listen(function($query){
        //     Log::info($query->sql);
        // });
        return view('blogs', [
            // 'blogs' => $this->getBlogs(),
            'blogs' => Blog::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog) {
        return view('blog', ['blog' => $blog,'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
    }

    protected function getBlogs(){
        // $blogs = Blog::latest();
        // if(request('search')){
        //     $blogs = $blogs->where('title','LIKE', '%' . request('search'). '%')
        //     ->orWhere('body','LIKE', '%' . request('search'). '%');
        // }

        // $blogs->when(request('search'),function($query,$search){
        //     $query->where('title','LIKE', '%' . $search. '%')
        //     ->orWhere('body','LIKE', '%' . $search. '%');
        // });
        // return $blogs->get();
    }
}