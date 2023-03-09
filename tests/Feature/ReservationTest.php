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

    public function test_reservation_step_one_page_is_displayed()
    {
        Table::factory()->available()->create();

        $response = $this->get(route('reservations.step_one'));

        $response->assertOk();
    }
}
