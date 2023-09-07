<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = "room";

    public function roomType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(RoomType::class, 'idRoom', 'idRoomType');
    }

    public function reservations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function getAllAvaliableRooms()
    {
        return \DB::table("room")
            ->select("room.idRoom", "room.roomName", "room.roomPrice", "room.maxPeoplePerRoom", "room.roomSize", "room.numberOfBeds", "room.roomPicture")
            ->join("roomtype", "room.idRoomType", "=", "roomtype.idRoomType")
             ->where("room.roomCount", '>', 0)
            ->get();
    }

    public function getOneRoom($idRoom)
    {
        return \DB::table("room")
            ->where("idRoom", "=", $idRoom)
            ->first();
    }

    public function getMinAndMaxRoomPrice()
    {
        return \DB::table("room")
            ->selectRaw("MIN(roomPrice) as MinRoomPrice, MAX(roomPrice) as MaxRoomPrice")
            ->get();
    }

    public function checkRoomForGivenDateAndRoomType($dateFrom, $dateTo1, $dateTo2, $idRoomType)
    {
        return \DB::select("SELECT * FROM reservedrooms WHERE
        :dateFrom BETWEEN dateFrom and dateTo OR
        :dateTo1 BETWEEN dateFrom and dateTo OR
        :dateTo2 < dateFrom AND idRoomType = :idRoomType", array("dateFrom" => $dateFrom, "dateTo1" => $dateTo1, "dateTo2" => $dateTo2, "idRoomType" => $idRoomType));

        // return \DB::table("reservedrooms")
        //     ->whereRaw("(? BETWEEN dateFrom and dateTo OR
        //          ? BETWEEN dateFrom and dateTo OR
        //          ? < dateFrom) AND idRoomType = ?", [$dateFrom, $dateTo, $dateTo, $idRoomType])->get();

        // return \DB::table("reservedrooms")
        //     ->whereRaw("$dateFrom BETWEEN dateFrom and dateTo OR
        //                   $dateTo BETWEEN dateFrom and dateTo OR
        //                   $dateTo < dateFrom AND idRoomType = $idRoomType")->get();
    }

    public function insertReservation($dateFrom, $dateTo, $idRoomType, $idUser, $paid = 0)
    {
        return \DB::table("reservedrooms")
            ->insert([
                ["dateFrom" => $dateFrom, "dateTo" => $dateTo, "idRoom" => $idRoomType, "idUser" => $idUser, "paid" => $paid]
            ]);
    }

    public function getMaxAndMinPeopleNumber()
    {
        return \DB::table("room")
            ->selectRaw("MIN(maxPeoplePerRoom) as minPeoplePerRoom, MAX(maxPeoplePerRoom) as maxPeoplePerRoom")
            ->first();
    }

    public function filterRoom($r)
    {
        $query = \DB::table("room");

        if ($r->has("roomType")) {
            if ($r->input("roomType") == 0) {
                $query = $query->where("idRoomType", "<>", $r->input("roomType"));
            } else {
                $query = $query->where("idRoomType", "=", $r->input("roomType"));
            }
        }

        if ($r->has("peopleNumber")) {
            $query = $query->where("maxPeoplePerRoom", "<=", $r->input("peopleNumber"));
        }

        if ($r->has("priceRange")) {
            $query = $query->where("roomPrice", "<=", $r->input("priceRange"));
        }

        return $query->get();
    }
}
