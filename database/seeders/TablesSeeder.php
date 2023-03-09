<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Table::create([
			'name' => 'Table 1',
			'guest_number' => 4,
			'location' => 'next to the window, next to the door',
		]);

		Table::create([
			'name' => 'Table 2',
			'guest_number' => 4,
			'location' => 'next to the door, left side',
		]);

		Table::create([
			'name' => 'Table 3',
			'guest_number' => 2,
			'location' => 'right, top midle',
		]);

		Table::create([
			'name' => 'Table 4',
			'guest_number' => 4,
			'location' => 'next to the door, right side',
		]);

		Table::create([
			'name' => 'Table 5',
			'guest_number' => 4,
			'location' => 'next to the door, right side',
		]);

		Table::create([
			'name' => 'Table 6',
			'guest_number' => 4,
			'location' => 'next to the door, right side',
		]);

		Table::create([
			'name' => 'Table 7',
			'guest_number' => 4,
			'location' => 'next to the door, right side',
		]);

		Table::create([
			'name' => 'Table 8',
			'guest_number' => 4,
			'location' => 'next to the door, right side',
		]);
    }
}
