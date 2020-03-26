<?php


namespace App\Models;


class User
{
    public static function getUsernameAndPassword($username, $password)
    {
        return \DB::table("users as u")
            ->join("roles as r", "u.idRole", "=", "r.idRole")
            ->where([
                ["username", "=", $username],
                ["password", "=", md5($password)]
            ])->first();
    }

    public static function getUsernameAndEmail($username, $email)
    {
        return \DB::table("users as u")
            ->join("roles as r", "u.idRole", "=", "r.idRole")
            ->where([
                ["username", "=", $username],
                ["email", "=", $email]
            ])->first();
    }

    public function getUserForEmail($email)
    {
        return \DB::table("users as u")
            ->join("roles as r", "u.idRole", "=", "r.idRole")
            ->where([
                ["email", "=", $email]
            ])
            ->first();
    }

    public function getUserIdFromEmail($email)
    {
        return \DB::table("users")
            ->select("idUser")
            ->where("email", "=", $email)->first();
    }

    public static function changePassword($username, $password)
    {
        return \DB::table('users')
            ->where("username", "=", $username)
            ->update(["password" => md5($password), "originalPassword" => $password]);
    }

    public function registerUser($crUsername, $crEmail, $crPassword)
    {
        return \DB::table('users')
            ->insert([
                ["username" => $crUsername, "email" => $crEmail, "password" => md5($crPassword), "originalPassword" => $crPassword, "active" => 0, "idRole" => 2]
            ]);
    }

    public function enableActive($username)
    {
        return \DB::table('users')
            ->where("username", "=", $username)
            ->update(["active" => 1]);
    }

    public function disableActive($username)
    {
        return \DB::table('users')
            ->where("username", "=", $username)
            ->update(["active" => 0]);
    }
}
