<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index (){
        return view('admin.blogs.index',[
            'blogs' => Blog::latest()->paginate(6),
        ]);
    }

    public function create(){
        return view('admin.blogs.create',[
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


    public function edit(Blog $blog){
        return view('admin.blogs.edit',[
            'blog' => $blog,
            'categories' => Category::all(),
        ]);
    }
    
    public function destroy(Blog $blog){
        $blog->delete();

        return back();
    }

    public function update(Blog $blog){
        $formDatas = request()->validate([
            "title" => ['required'],
            "slug" => ['required', Rule::unique('blogs','slug')->ignore($blog->id)],
            "intro" => ['required'],
            "body" => ['required'],
            "category_id" => ['required', Rule::exists('categories','id')],
        ]);

        $formDatas['user_id'] = auth()->user()->id;
        $formDatas['thumbnail'] = request()->file('thumbnail')->store('thumbnails') ?  "storage/" . request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;
        $blog->update($formDatas);

        return redirect('/');
    }

}
