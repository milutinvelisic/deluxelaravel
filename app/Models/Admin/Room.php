<?php

namespace App\Models\Admin;

class Room
{

    public function getColumnNamesForRoomTable()
    {
        return \DB::select("SHOW COLUMNS from room");
    }

    public function getAllRooms()
    {
        return \DB::table("room")->get();
    }

    public function getRoomForId($id)
    {
        return \DB::table("room")
            ->where("idRoom", "=", $id)
            ->first();
    }

    public function getPathForIdRoom($id)
    {
        return \DB::table("room")
            ->where("idRoom", "=", $id)
            ->first();
    }

    public function deleteRoomForId($id)
    {
        $pathInDB = $this->getPathForIdRoom($id);
        $pathForDelete = "images/" . $pathInDB->roomPicture;

        unlink($pathForDelete);

        return \DB::table("room")
            ->where("idRoom", "=", $id)
            ->delete();
    }

    public function insertRoom($r, $picture)
    {
        return \DB::table("room")
            ->insertGetId([
                "roomName" => $r->input("roomName"),
                "roomPicture" => $picture,
                "idRoomType" => 1,
                "roomPrice" => $r->input("roomPrice"),
                "maxPeoplePerRoom" => $r->input("maxPeoplePerRoom"),
                "roomSize" => $r->input("roomSize"),
                "numberOfBeds" => $r->input("numberOfBeds"),
                "idRoomStatus" => 1
            ]);
    }

    public function updateRoom($r, $picture = null, $id)
    {
        $params = [
            "roomName" => $r->input("roomName"),
            "idRoomType" => 1,
            "roomPrice" => $r->input("roomPrice"),
            "maxPeoplePerRoom" => $r->input("maxPeoplePerRoom"),
            "roomSize" => $r->input("roomSize"),
            "numberOfBeds" => $r->input("numberOfBeds"),
            "idRoomStatus" => 1
        ];

        if ($picture) {
            $params["roomPicture"] = $picture;
        }

        return \DB::table("room")
            ->where("idRoom", "=", $id)
            ->update($params);
    }
}
