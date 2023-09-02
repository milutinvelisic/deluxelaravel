<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Services\ReservationService;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationsController
{
    private Reservation $model;
    private ReservationService $reservationService;

    public function __construct(Reservation $reservation, ReservationService $reservationService)
    {
        $this->model = $reservation;
        $this->reservationService = $reservationService;
    }

    public function index() {
        return view("admin.pages.reservations", [
            "columnNames" => $this->model->getColumnNamesForRoomTable(),
            "allReservations" => $this->model->getAllReservations()
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view("admin.pages.reservationsEditForm", [
            "reservation" => $this->model->getReservationForId($id)
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        if ($this->reservationService->updateReservation($request, $id)) {
            return redirect()->back();
        } else {
            return redirect()->back()->with("msg", "Error with updating reservation, please try again in 30 minutes!");
        }
    }

    public function destroy($id)
    {
        try {

            $this->reservationService->deleteReservationForId($id);

            return $this->model->getAllReservations();
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return $ex->getMessage();
        }
    }
}
