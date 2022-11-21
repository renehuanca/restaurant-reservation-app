<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

final class ReservationService
{
	public function reservationsInDate(string $date): Collection
	{
		return Reservation::orderBy('to_date')->get()->filter(function($value) use($date) {
			$valueDate = Carbon::parse($value->to_date);
		    $reservationDate = Carbon::parse($date);

			return $valueDate->equalTo($reservationDate);
		});
	}
}
