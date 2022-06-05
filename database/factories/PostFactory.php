<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->name(),
            "description" => $this->faker->text(),
            "preview" => $this->faker->text(50),
            "thumbnail" => $this->faker->image(public_path('img'), 640, 520, null, false),
            //"thumbnail" => $this->faker->image(storage_path('app/public/posts'), 640, 520, null, false),
        ];
    }
}
