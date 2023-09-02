<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Room;
use App\Services\RoomService;
use Exception;
use Illuminate\Http\Request;

class RoomsController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new Room();
    }

    public function index()
    {
        return view("admin.pages.rooms", [
            "columnNames" => $this->model->getColumnNamesForRoomTable(),
            "allRooms" => $this->model->getAllRooms()
        ]);
    }

    public function create()
    {
        return view("admin.pages.insertRoomForm");
    }

    public function store(Request $request)
    {
        $service = new RoomService();

        if ($service->insert($request)) {
            return redirect()->back();
        } else {
            return redirect()->back()->with("msg", "Error with inserting room, please try again in 30 minutes!");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view("admin.pages.editRoomForm", [
            "room" => $this->model->getRoomForId($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = new RoomService();

        if ($service->update($request, $id)) {
            return redirect()->back();
        } else {
            \Log::warning("Error with inserting room, please try again in 30 minutes!");
            return redirect()->back()->with("msg", "Error with inserting room, please try again in 30 minutes!");
        }
    }

    public function destroy($id)
    {
        try {

            $this->model->deleteRoomForId($id);

            return $this->model->getAllRooms();
        } catch (Exception $ex) {
            \Log::warning($ex->getMessage());
            return $ex->getMessage();
        }
    }
}
