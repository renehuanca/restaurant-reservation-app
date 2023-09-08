<?php

namespace Tests\Feature;

use App\Http\Controllers\DarkModeController;
use Tests\TestCase;

class DarkModeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_has_a_default_dark_mode_value()
    {
        $response = $this->get('/');

        $response->assertViewHas('dark_mode', DarkModeController::DEFAULT_DARK_MODE);
    }

    public function test_when_switch_dark_mode_it_has_a_session()
    {
        $response = $this->get(route('dark_mode_switcher'));
        $response->assertSessionHas('dark_mode', DarkModeController::DEFAULT_DARK_MODE);
        $response = $this->get(route('dark_mode_switcher'));
        $response->assertSessionHas('dark_mode', !DarkModeController::DEFAULT_DARK_MODE);
    }
}
