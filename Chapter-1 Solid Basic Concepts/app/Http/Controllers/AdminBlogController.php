<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index (){
        return view('admin.blogs.index');
    }

    public function create(){
        return view('blogs.create',[
            'categories' => Category::all(),
        ]);
    }

    public function store(){
        $formDatas = request()->validate([
            "title" => ['required'],
            "slug" => ['required', Rule::unique('blogs','slug')],
            "intro" => ['required'],
            "body" => ['required'],
            "category_id" => ['required', Rule::exists('categories','id')],
        ]);

        $formDatas['user_id'] = auth()->user()->id;
        $formDatas['thumbnail'] = "storage/" . request()->file('thumbnail')->store('thumbnails');
        Blog::create($formDatas);

        return redirect('/');
    }

}
