<?php

namespace Tests\Feature;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_reservation_step_one_page_is_displayed_if_there_is_at_least_a_table()
    {
        Table::factory()->available()->create();

        $response = $this->get(route('reservations.step_one'));

        $response->assertOk();
    }

    public function test_step_one_reservation_to_step_two()
    {
        Table::factory()->available()->create();

        $reservation = [
            "first_name" => "Juan",
            "last_name" => "Mamani",
            "email" => "juan@gmail.com",
            "to_date" => "2023-09-09T20:00",
            "phone" => "76363633",
            "guest_number" => "2",
        ];

        $response = $this->get(route('reservations.step_two', $reservation));

        $response->assertSessionHas('reservation', $reservation);
    }
}
