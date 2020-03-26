<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.pages.users", [
            "columnNames" => $this->userModel->getColumnNamesForUserTable(),
            "allUsers" => $this->userModel->getAllUsers()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.insertUserForm", [
            'userRoles' => $this->userModel->getUserRoles()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->userModel->insertUser($request)) {
            return redirect()->back();
        } else {
            return redirect()->back()->with("msg", "Error with inserting user, please try again in 30 minutes!");
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
        return view("admin.pages.editUserForm", [
            "user" => $this->userModel->getUserForId($id)
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
        try {

            $this->userModel->updateUserById($id, $request);

            return redirect()->back()->with("msg", "User Updated");
        } catch (Exception $ex) {
            \Log::warning($ex->getMessage());
            return $ex->getMessage();
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

            $this->userModel->deleteUserForId($id);

            return $this->userModel->getAllUsers();
        } catch (Exception $ex) {
            \Log::warning($ex->getMessage());
            return $ex->getMessage();
        }
    }
}
