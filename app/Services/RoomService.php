<?php


namespace App\Services;

use App\Models\Admin\Room;
use App\Models\Reservation;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;

class RoomService
{

    private $model;

    public function __construct()
    {
        $this->model = new Room();
    }

    public function insert($request)
    {


        \DB::beginTransaction();
        try {
            $picture = $this->upload($request);

            $idRoom =  $this->model->insertRoom($request, $picture);

            \DB::commit();
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    public function update($request, $id)
    {
        \DB::beginTransaction();
        try {
            if ($request->file("roomPicture")) {

                $picture = $this->upload($request);

                $this->model->updateRoom($request, $picture, $id);
            } else {

                $this->model->updateRoom($request, $picture = null, $id);
            }

            \DB::commit();
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            \DB::rollback();
        }
    }

    private function upload($request)
    {
        $slika = $request->file("roomPicture");

        // foreach($slike as $slika) {
        $picture = UploadImage::upload($slika); // naziv slike
        // }
        return $picture;
    }

    public function checkRoomForGivenDateAndRoomType($dateFrom, $dateTo, $idRoom): bool
    {
        $occupiedRooms = DB::table('reservedrooms')
            ->where('idRoom', $idRoom)
            ->where(function ($query) use ($dateFrom, $dateTo) {
                $query->whereBetween('dateFrom', [$dateFrom, $dateTo])
                    ->orWhereBetween('dateTo', [$dateFrom, $dateTo])
                    ->orWhere(function ($query) use ($dateFrom, $dateTo) {
                        $query->where('dateFrom', '<=', $dateFrom)
                            ->where('dateTo', '>=', $dateTo);
                    });
            })
            ->count();
        $roomsCount = Rooms::where('idRoom', $idRoom)->value('roomCount');

        return $occupiedRooms >= $roomsCount;
    }
}
