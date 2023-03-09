<?php

namespace Tests\Feature\Tables;

use App\Http\Middleware\TablesAvailable;
use App\Models\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class TablesAvailableMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_there_are_not_tables_available_is_abort()
    {
        $middleware = new TablesAvailable();
        $request = Request::create('/reservation', 'GET');
        try {
            $response = $middleware->handle($request, function () { });
        } catch (\Throwable $th) {
            $this->assertEquals($th->getMessage(), 'Ups!! there are not tables available.');
        }
    }
    public function test_if_there_are_tables_available_is_next()
    {
        Table::factory()->available()->create();
        $middleware = new TablesAvailable();
        $request = Request::create('/reservation', 'GET');
        $response = $middleware->handle($request, function () { });
        $this->assertEquals($response, null);
    }
}
