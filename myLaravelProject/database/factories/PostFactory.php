<?php

namespace Database\Factories;

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
        return [
            'title'=>fake()->sentence(),
            'body'=>fake()->realText(),
            'path'=>(explode('/',(fake()->image('public/images'))))[2],
            'user_id'=>User::factory()->make()
        ];
    }
}
