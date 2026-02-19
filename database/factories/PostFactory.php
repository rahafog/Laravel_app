<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
    public function definition(): array
    {
        $images=['1.jpeg','2.jpeg','3.jpeg','4.jpeg','5.jpeg','6.png'];
        return [
            'description'=>fake()->sentence(),
            'slug'=>Str::slug(fake()->sentence(6)),
            'image'=>'posts/'.fake()->randomElement($images),
            'user_id'=>User::factory(),
        ];
    }
}
