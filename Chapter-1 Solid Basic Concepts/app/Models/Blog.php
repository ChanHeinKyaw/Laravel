<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public function __construct($title, $slug, $intro, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug',$slug);
        // dd($blogs->first()); // first item
        // dd($blogs->last()); // last item

        // $path = resource_path("blogs/$slug.html");
        // if (!file_exists($path)) {
        //     return redirect('/');
        // }
        // return cache()->remember("posts.$slug", now()->addDay(), function () use ($path) {
        //     return file_get_contents($path);
        // });
    }

    public static function all()
    {
        return collect(File::files(resource_path("blogs")))->map(function($file){
            $obj = YamlFrontMatter::parseFile($file);
            return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        });

        // return array_map(function($file){
        //     $obj = YamlFrontMatter::parseFile($file);
        //     return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        // },$files);

        // $blogs = [];
        // foreach ($files as $file) {
        //     $obj = YamlFrontMatter::parseFile($file);
        //     $blog = new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
        //     $blogs[] = $blog;
        // }

        // return $blogs;
        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files);
    }
}
