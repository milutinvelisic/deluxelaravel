<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckRoomRequest;
use App\Http\Requests\RoomFilterRequest;
use App\Models\Categories;
use App\Services\RoomService;
use Illuminate\Http\Request;
use App\Models\Rooms;

class RoomsController extends Controller
{

    private $roomModel;
    private $roomService;

    public function __construct(Rooms $rooms, RoomService $roomService)
    {
        $this->roomModel = $rooms;
        $this->roomService = $roomService;
    }


    public function index()
    {
        $categoryModel = new Categories();

        $getAllAvaliableRooms = $this->roomModel->getAllAvaliableRooms();

        $getMinAndMaxRoomPrice = $this->roomModel->getMinAndMaxRoomPrice();

        return view("pages.rooms", [
            "avaliableRooms" => $getAllAvaliableRooms,
            "minAndMaxRoomPrice" => $getMinAndMaxRoomPrice,
            "roomCategories" => $categoryModel->getAllCategories(),
            "peoplePerRoom" => $this->roomModel->getMaxAndMinPeopleNumber()
        ]);
    }

    public function getRoom($id)
    {
        $categoryModel = new Categories();
        $room = $this->roomModel->getOneRoom($id);

        return view("pages.singleRoom", [
            "room" => $room,
            "roomCategories" => $categoryModel->getAllCategories()
        ]);
    }

    public function checkRoom(CheckRoomRequest $request): string
    {
        $dateFrom = $request->input("dateFrom");
        $dateTo1 = $request->input("dateTo");
        $dateTo2 = $request->input("dateTo");
        $idRoom = $request->input("idRoom");

        $rooms = $this->roomService->checkRoomForGivenDateAndRoomType($dateFrom, $dateTo1, $dateTo2, $idRoom);

        if ($rooms) {
            return "Nema slobodan termin";
        } else {
            return "Ima slobodan termin";
        }
    }

    public function filterRoom(RoomFilterRequest $r)
    {
        return $this->roomModel->filterRoom($r);
    }
}
