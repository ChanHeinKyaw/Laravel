<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Blog
{
    public static function find($slug)
    {
        $path = resource_path("blogs/$slug.html");
        if (!file_exists($path)) {
            return redirect('/');
        }
        return cache()->remember("posts.$slug", now()->addDay(), function () use ($path) {
            return file_get_contents($path);
        });
    }

    public static function all()
    {
        $files = File::files(resource_path("blogs"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
}
