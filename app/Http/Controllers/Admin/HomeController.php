<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $userModel = new User();

        return view("admin.pages.home", [
            "countActive" => $userModel->countActiveUsers(),
            "countAdmins" => $userModel->countActiveAdmins(),
            "countAllUsers" => $userModel->countAllUsers(),
            "countAllAdmins" => $userModel->countAllAdmins()
        ]);
    }
}
