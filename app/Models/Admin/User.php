<?php

namespace App\Models\Admin;

class User
{

    public function getColumnNamesForUserTable()
    {
        return \DB::select("SHOW COLUMNS from users");
    }

    public function getAllUsers()
    {
        return \DB::table("users")->get();
    }

    public function getUserRoles()
    {
        return \DB::table("roles")->get();
    }

    public function getUserForId($id)
    {
        return \DB::table("users")
            ->where("idUser", "=", $id)
            ->first();
    }

    public function deleteUserForId($id)
    {
        return \DB::table("users")
            ->where("idUser", "=", $id)
            ->delete();
    }

    public function updateUserById($id, $request)
    {
        return \DB::table("users")
            ->where("idUser", "=", $id)
            ->update(array(
                'email' => $request->input("email"),
                'password' => md5($request->input("password")),
                "originalPassword" => $request->input("password"),
                'idRole' => $request->input("idRole")
            ));
    }

    public function insertUser($r)
    {
        return \DB::table("users")
            ->insert([
                "username" => $r->input("username"),
                "password" => md5($r->input("password")),
                "originalPassword" => $r->input("password"),
                "email" => $r->input("email"),
                "active" => 0,
                "idRole" => $r->input("userRole")
            ]);
    }

    public function countActiveUsers()
    {
        return \DB::table("users")->where("idRole", "=", 2)->where("active", "=", 1)->selectRaw("COUNT(*) as countActive")->first();
    }

    public function countAllUsers()
    {
        return \DB::table("users")->where("idRole", "=", 2)->selectRaw("COUNT(*) as countAllUsers")->first();
    }

    public function countActiveAdmins()
    {
        return \DB::table("users")->where("active", "=", 1)->where("idRole", "=", 1)->selectRaw("COUNT(*) as countAdmin")->first();
    }

    public function countAllAdmins()
    {
        return \DB::table("users")->where("idRole", "=", 1)->selectRaw("COUNT(*) as countAllAdmins")->first();
    }
}
