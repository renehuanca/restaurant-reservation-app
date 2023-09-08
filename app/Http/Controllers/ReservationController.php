<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepTwoReservationRequest;
use App\Http\Requests\StoreReservationRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Services\TableService;
use Carbon\Carbon;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
	public function stepOne()
	{
		return view('reservation.step_one', [
			'reservation' => session()->has('reservation') ? session()->get('reservation') : new Reservation,
			'minDate' => Carbon::today(),
			'maxDate' => Carbon::now()->addWeek(),
		]);
	}

	public function stepTwo(StepTwoReservationRequest	$request, TableService $tableService)
	{
		session()->put('reservation', $request->validated());

		return view('reservation.step_two', [
			'tablesAvailable' => $tableService->tablesAvailable($request->guest_number, $request->to_date),
			'allTables' => Table::all(),
		]);
	}

	public function store(StoreReservationRequest $request)
	{
		$tableToReserve = Table::findOrFail($request->table_id);
		if (!$tableToReserve->status == 'available') {
			abort(Response::HTTP_NOT_FOUND, 'Table is not available.');
		}

		$id = Reservation::create([...session()->get('reservation'), 'table_id' => $request->table_id]);

		return to_route('reservations.success', ['reservation' => $id]);
	}

	public function success(Reservation $reservation)
	{
		session()->forget('reservation');

		return view('reservation.success', ['reservation' => $reservation]);
	}

	public function index(Request $request)
	{
		$search = $request->query('search');
		if ($search) {
			// aumentar otros campos y solucionar cuando buscar y haces la paginacion
			$reservations = Reservation::where('first_name', 'LIKE', '%' . $search . '%')->paginate(5);
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
