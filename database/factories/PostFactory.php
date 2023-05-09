<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
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
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'user_id' => User::factory()->make(),
            'category_id' => $category->id
        ];
    }
}
