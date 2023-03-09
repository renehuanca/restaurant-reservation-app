<?php

namespace Database\Factories;

use App\Enums\TableStatus;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Table ' . fake()->numberBetween(1, 10),
			'guest_number' => fake()->randomNumber(2),
			'status' => fake()->randomElement(TableStatus::cases()),
			'location' => fake()->randomElement(['next to the window, next to the door'])
        ];
    }

    /**
     * Indicate that the Table is available
     */
    public function available()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => TableStatus::Available
            ];
        });
    }
}
