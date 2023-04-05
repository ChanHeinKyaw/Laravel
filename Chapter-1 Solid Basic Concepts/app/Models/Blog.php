<?php

namespace App\Models;

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
}
