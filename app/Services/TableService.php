<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TableStatus;
use App\Models\Table;
use Illuminate\Database\Eloquent\Collection;

final class TableService
{
	public function hasTablesAvailable(): bool
	{
		$tables = Table::where('status', TableStatus::Available)
			->get();

		return count($tables) > 0;
	}

	public function tablesAvailable(string $guestNumber, string $date): Collection
	{
		$reservationsInDate = (new ReservationService)->reservationsInDate($date);

		return Table::where('status', TableStatus::Available)
			->where('guest_number', '>=', $guestNumber)
			->whereNotIn('id', $reservationsInDate->pluck('table_id'))
			->get();
	}
}
