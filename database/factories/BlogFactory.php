<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(), // return category id
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'intro' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => User::factory(), // return user id
        ];
    }
}
