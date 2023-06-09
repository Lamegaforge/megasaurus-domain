<?php

namespace Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domain\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    public $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->name(),
            'external_id' => fake()->randomNumber(8, true),
        ];
    }
}