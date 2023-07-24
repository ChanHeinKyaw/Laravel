<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index() {
        // DB::listen(function($query){
        //     Log::info($query->sql);
        // });
        return view('blogs.index', [
            // 'blogs' => $this->getBlogs(),
            'blogs' => Blog::latest()
                        ->filter(request(['search','category','username']))
                        ->simplePaginate(6)
                        ->withQueryString(),
            // 'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog) {
        return view('blogs.show', ['blog' => $blog,'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
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

    public function subscriptionHandler(Blog $blog){
        if(auth()->user()->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }

        return back();
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