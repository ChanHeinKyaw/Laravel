<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
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
        Comment::truncate();

        $mgmg = User::factory()->create(['name' => 'mgmg','username' => 'mgmg']);
        $aungaung = User::factory()->create(['name' => 'aungaung','username' => 'aungaung']);
        $frontend = Category::factory()->create(['name' => 'frontend','slug'=> 'frontend']); // over write category factory "name" data
        $backend = Category::factory()->create(['name' => 'backend','slug'=> 'backend']);  // over write category factory "name" data

        Blog::factory(2)->create(['category_id' => $frontend->id,'user_id' => $mgmg->id ]); // over write blog factory "category_id" data
        Blog::factory(2)->create(['category_id' => $backend->id,'user_id' => $aungaung->id ]); // over write blog factory "category_id" data
    
        Comment::factory(3)->create();
    }
}