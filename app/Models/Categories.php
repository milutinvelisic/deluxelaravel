<?php

namespace App\Models;

class Categories
{

    public function getAllCategories()
    {
        return \DB::table("roomtype")->get();
    }
}
