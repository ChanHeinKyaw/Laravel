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
        \App\Models\User::factory()->create();

        $frontend = Category::create([
            'name' => 'frontend',
            'slug' => 'frontend'
        ]);

        $backend = Category::create([
            'name' => 'backend',
            'slug' => 'backend'
        ]);

        Blog::create([
            'title' => 'frontend post',
            'slug' => 'frontend-post',
            'intro' => 'this is intro',
            'body' =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus minima esse provident eos neque, adipisci eligendi eveniet, numquam architecto veritatis unde earum, sunt fuga ex error magni mollitia aliquid repellat ratione in rem. Tenetur nihil, voluptas minus omnis enim consequuntur assumenda alias reiciendis asperiores consectetur libero ratione nemo officiis quidem.',
            'category_id' => $frontend->id,
        ]);

        Blog::create([
            'title' => 'backend post',
            'slug' => 'backend-post',
            'intro' => 'this is intro',
            'body' =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus minima esse provident eos neque, adipisci eligendi eveniet, numquam architecto veritatis unde earum, sunt fuga ex error magni mollitia aliquid repellat ratione in rem. Tenetur nihil, voluptas minus omnis enim consequuntur assumenda alias reiciendis asperiores consectetur libero ratione nemo officiis quidem.',
            'category_id' => $backend->id,
        ]);
    }
}