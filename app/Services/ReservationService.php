<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReservationService
{
    private Reservation $model;

    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function updateReservation($request, $id): bool
    {
        DB::beginTransaction();
        try {
            $this->model->updateReservation($request, $id);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($exception->getFile());
            Log::error($exception->getLine());
            DB::rollBack();
            return false;
        }
    }

    public function deleteReservationForId($id)
    {
        return \DB::table("reservedrooms")
            ->where("idReservedRoom", "=", $id)
            ->delete();
    }
}
