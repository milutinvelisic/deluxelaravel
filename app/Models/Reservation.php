<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservedrooms';

    public function getColumnNamesForRoomTable(): array
    {
        return DB::select("SHOW COLUMNS from reservedrooms");
    }

    public function getAllReservations(): \Illuminate\Support\Collection
    {
        return DB::table("reservedrooms")
            ->join('room', 'reservedrooms.idRoom', '=', 'room.idRoom')
            ->get();
    }

    public function getReservationForId($id)
    {
        return DB::table("reservedrooms")
            ->where("idReservedRoom", "=", $id)
            ->first();
    }

    public function updateReservation($r, $id)
    {
        $params = [
            "dateFrom" => strtotime(DateTime::createFromFormat('Y-m-d', $r->input('dateFrom'))->format('d-m-Y')),
            "dateTo" => strtotime(DateTime::createFromFormat('Y-m-d', $r->input('dateTo'))->format('d-m-Y')),
            "idRoom" => $r->input("idRoom"),
            "idUser" => $r->input("idUser"),
        ];

        return \DB::table("reservedrooms")
            ->where("idReservedRoom", "=", $id)
            ->update($params);
    }

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'idRoomType');
    }

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Rooms::class);
    }
}
