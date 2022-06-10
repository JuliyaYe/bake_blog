<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => $this->faker->name(),
            "preview"=> $this->faker->text(50),
            "description" => $this->faker->text(2000),
//            "thumbnail" => $this->faker->image("public/storage/recipes", 640, 480, null, false)
        ];
    }
}
