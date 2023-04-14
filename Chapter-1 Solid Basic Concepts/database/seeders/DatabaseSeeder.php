<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();
        User::factory()->create();

        $frontend = Category::factory()->create(['name' => 'frontend']); // over write category factory "name" data
        $backend = Category::factory()->create(['name' => 'backend']);  // over write category factory "name" data

        Blog::factory(2)->create(['category_id' => $frontend->id ]); // over write blog factory "category_id" data
        Blog::factory(2)->create(['category_id' => $backend->id ]); // over write blog factory "category_id" data
    }
}