<?php

namespace App\Http\Controllers;

use App\Models\Admin\Room;
use App\Models\Categories;
// use App\Rooms;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $model = new Room;

        $categories = $model->getAllRooms();

        return view("pages.home", [
            "categories" => $categories
        ]);
    }
}
