<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Services\TableService;
use Carbon\Carbon;

class ReservationController extends Controller
{
	public function stepOne()
	{
		$reservation = new Reservation();
		if (session()->has('reservation')) {
			$reservation = session()->get('reservation');
		}

		return view('reservation.step_one', [
			'reservation' => $reservation,
			'minDate' => Carbon::today(),
			'maxDate' => Carbon::now()->addWeek(),
		]);
	}

	public function stepTwo(StoreReservationRequest	$request, TableService $tableService)
	{
		$reservation = $request->validated();

		session()->put('reservation', $reservation);

		$tablesAvailable = $tableService->tablesAvailable($reservation['guest_number'], $reservation['to_date']);

		$allTables = Table::all();

		return view('reservation.step_two', [
			'tablesAvailable' => $tablesAvailable,
			'allTables' => $allTables,
		]);
	}

	public function store(Request $request)
	{
		$request->validate(['table_id' => 'required|integer']);
		$reservation = session()->get('reservation');
		$reservation['table_id'] = $request->input('table_id');
		$id = Reservation::create($reservation);	

		return to_route('reservation.success', ['reservation' => $id]);
	}

	public function success(Reservation $reservation)
	{
		if (! session()->has('reservation')) {
			return to_route('welcome');
		}

		session()->forget('reservation');

		return view('reservation.success', ['reservation' => $reservation]);
	}
}
