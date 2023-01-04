<?php

namespace Database\Factories;

use Domain\Posts\Models\Post;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'summary' => fake()->sentence(),
            'published_at' => now(),
        ];
    }
}
