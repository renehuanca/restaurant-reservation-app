<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class ReservationService
{
	/**
	 * Reservation in date obtain all the reservation just in date in format string ('Y-m-d')
	 */
	public function reservationsInDate(string $date): Collection
	{
		$date = Carbon::parse($date)->format('Y-m-d');

		return Reservation::orderBy('to_date')->get()->filter(function($value) use($date) {
			$dateOnRecord = Carbon::parse($value->to_date)->format('Y-m-d');

			return $date == $dateOnRecord;
		});
	}
}
