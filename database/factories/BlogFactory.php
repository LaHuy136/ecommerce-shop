<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(4),
            'slug' => fake()->unique()->slug(3),
            'image' => 'https://picsum.photos/320/240?random=' . rand(1, 999),
            'description' => fake()->paragraph(),
            'content' => fake()->paragraph(5),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
