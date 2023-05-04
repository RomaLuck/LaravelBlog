<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = Category::inRandomOrder()->first();
        return [
            'title'=>fake()->sentence(),
            'body'=>fake()->paragraph(),
            'path'=>(explode('/',(fake()->image('public/images'))))[2],
            'user_id'=>User::factory()->make(),
            'category_id'=>$category->id
        ];
    }
}
