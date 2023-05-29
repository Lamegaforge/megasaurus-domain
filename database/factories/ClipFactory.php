<?php

namespace Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domain\Enums\ClipStateEnum;
use Domain\Models\Clip;
use Domain\Models\Author;
use Domain\Models\Game;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clip>
 */
class ClipFactory extends Factory
{
    public $model = Clip::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'external_id' => fake()->randomNumber(8, true),
            'external_game_id' => fake()->randomNumber(8, true),
            'url' => 'https://clips.twitch.tv/NaiveGoodWoodcockNinjaGrumpy-25Uu8L5urSxWo66M',
            'title' => fake()->sentence(),
            'views' => fake()->randomNumber(3),
            'duration' => 15,
            'state' => ClipStateEnum::Ok,
            'published_at' => '2023-01-01',
        ];
    }

    public function withState(ClipStateEnum $clipStateEnum): Factory
    {
        return $this->state(function (array $attributes) use ($clipStateEnum) {
            return [
                'state' => $clipStateEnum,
            ];
        });
    }

    public function configure()
    {
        return $this->afterMaking(function (Clip $clip) {
            if ($clip->author()->doesntExist()) {
                $clip->author()->associate(Author::factory()->create());
            }
            if ($clip->game()->doesntExist()) {
                $clip->game()->associate(Game::factory()->create());
            }
        });
    }
}
