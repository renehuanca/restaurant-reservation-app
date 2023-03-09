<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
			'first_name' => fake()->name(),
			'last_name' => fake()->lastName(),
			'email' => fake()->email(),
			'phone' => fake()->phoneNumber(),
			'to_date' => "2023-03-02T17:30",
			'table_id' => Table::factory(),
			'guest_number' => fake()->randomNumber(2)
        ];
    }
}
