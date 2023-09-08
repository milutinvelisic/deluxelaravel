<?php

namespace App\Models;

class Categories
{

    public function getAllCategories()
    {
        return \DB::table("room")->select('idRoom', 'roomName')->get();
    }
}
