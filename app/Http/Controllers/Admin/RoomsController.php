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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.rooms", [
            "columnNames" => $this->model->getColumnNamesForRoomTable(),
            "allRooms" => $this->model->getAllRooms()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.insertRoomForm");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new RoomService();

        if ($service->insert($request)) {
            return redirect()->back();
        } else {
            return redirect()->back()->with("msg", "Error with inserting room, please try again in 30 minutes!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.pages.editRoomForm", [
            "room" => $this->model->getRoomForId($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
