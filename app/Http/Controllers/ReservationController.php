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

	public function store(Request $request, TableService $tableService)
	{
		$request->validate(['table_id' => 'required|integer']);

		$reservation = session()->get('reservation');

		$reservation['table_id'] = $request->input('table_id');

		// for a parallel reservation
		$table = Table::find($reservation['table_id']);
		if (! $table->status == 'available') {
			abort(402, 'Table is not available recently');
		}

		$id = Reservation::create($reservation);	

		return to_route('reservations.success', ['reservation' => $id]);
	}

	public function success(Reservation $reservation)
	{
		if (! session()->has('reservation')) {
			return to_route('welcome');
		}

		session()->forget('reservation');

		return view('reservation.success', ['reservation' => $reservation]);
	}

	public function index(Request $request)
	{
		$search = $request->query('search');
		if ($search) {
			// aumentar otros campos y solucionar cuando buscar y haces la paginacion
			$reservations = Reservation::where('first_name', 'LIKE', '%'.$search.'%')->paginate(5);
		} else {
		 	$reservations = Reservation::orderBy('to_date', 'ASC')->paginate(2);
		}

		return view('reservation.index', [
			'reservations' => $reservations,
			'search' => $search,
		]);
	}

	public function create()
	{
		return view('reservation.create', [
			'reservation' => new Reservation(),
			'minDate' => Carbon::today(),
			'maxDate' => Carbon::now()->addWeek(),
		]);
	}
}
