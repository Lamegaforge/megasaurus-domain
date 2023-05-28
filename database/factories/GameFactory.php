<?php

namespace Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domain\Models\Game;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    public $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_id' => fake()->randomNumber(8, true),
            'name' => fake()->name(),
        ];
    }
}
