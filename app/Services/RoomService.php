<?php


namespace App\Services;

use App\Models\Admin\Room;

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
}
