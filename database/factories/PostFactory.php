<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(5),
            "description" => $this->faker->sentence(15),
            "image" => $this->faker->uuid(6) . '.jpg',
            "user_id" => $this->faker->randomElement([1])
        ];
    }
}
