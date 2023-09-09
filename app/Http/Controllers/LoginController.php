<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages.login");
    }

    public function registerPage()
    {
        return view("pages.register");
    }

    public function login(LoginRequest $request)
    {

        $username = $request->input("logUsername");
        $password = $request->input("logPassword");

        try {

            $model = new User();
            $user = User::getUsernameAndPassword($username, $password);

            if ($user) {

                $request->session()->put("user", $user);
                $active  = $model->enableActive($request->session()->get("user")->username);
                if ($active) {
                    return redirect("/home")->with("msg", "You logged in successfully!");
                } else {
                    \Log::warning('Couldnt set active user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
                    return redirect("/home");
                }
            } else {
                \Log::warning('Couldnt find user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
                return redirect("/login")->with("msg", "Please try again!");
            }
        } catch (\Exception $ex) {
            \Log::warning($ex->getMessage());
            return redirect("/login")->with("msg", "Something went wrong, please try again!");
        }
    }

    public function register(RegisterRequest $request)
    {
        $username = $request->input("regUsername");
        $email = $request->input("regEmail");
        $password = $request->input("regPassword");

        try {

            $model = new User();
            $user = $model->registerUser($username, $email, $password);

            if ($user) {
                $userSession = User::getUsernameAndPassword($username, $password);
                $request->session()->put("user", $userSession);
                $model->enableActive($username);
                return redirect("/home")->with("msg", "You logged in successfully!");
            } else {
                \Log::warning('Couldnt register user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
                return redirect("/register")->with("msg", "Username is already taken, Please try again!");
            }
        } catch (Exception $ex) {
            \Log::warning($ex->getMessage());
            return redirect("/register")->with("msg", "Something went wrong, please try again!");
        }
    }

    public function logout(Request $request)
    {
        $model = new User();
        $userUsername = $request->session()->get("user")->username;

        $result = $model->disableActive($userUsername);

        if ($result) {

            $request->session()->forget("user");
            $request->session()->flush();
            return redirect("/home")->with("msg", "Logged out!");
        } else {
            \Log::warning('Couldnt logout in user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
            return redirect("/login")->with("msg", "Error with logout!");
        }
    }

    public function resetPassword(Request $request)
    {

        $email = $request->input("fpEmail");
        $username = $request->input("fpUsername");
        $token = $request->input("_token");

        $user = User::getUsernameAndEmail($username, $email);

        if ($user) {
            $request->session()->put("userForChange", $user);

            $mail = new PHPMailer(true);                            // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'milutinvelisic6@gmail.com';                 // SMTP username
                $mail->Password = 'jhcf wwke vutc ovvj';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('milutinvelisic6@gmail.com', 'Zavrsni rad Reset password');
                $mail->addAddress($email);  //'milutin.velisic.195.17@ict.edu.rs'   // Add a recipient               // Name is optional
                $mail->addReplyTo('milutinvelisic6@gmail.com', 'Information');

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Deluxe Contact Form';
                $mail->Body    = "Click on following link to set new password: http://127.0.0.1:8000/resetPassword/token=" . $token;

                $mail->send();


                return redirect("/login")->with("msg", "Email sent!");
            } catch (Exception $e) {
                \Log::warning($e->getMessage());
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

                return redirect("/login")->with("msg", "Error with sending email, please enter valid email!");
            }
        } else {
            \Log::warning('Couldnt log in user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
            return redirect()->with("msg", "Something went wrong, please try again later!");
        }
    }

    public function showForm()
    {
        return view("pages.resetPassword");
    }

    public function changePasswordMethod(Request $request)
    {

        $password = $request->input("setPassword");
        $userUsername = $request->session()->get("userForChange")->username;

        $user = User::changePassword($userUsername, $password);

        if ($user) {

            $model = new User();

            $email = $request->session()->get("userForChange")->email;

            $userLogged = $model->getUsernameAndEmail($userUsername, $email);

            if ($userLogged) {

                $request->session()->put("user", $userLogged);
                $newUserUsername = $request->session()->get("user")->username;

                $result = $model->enableActive($newUserUsername);

                if ($result) {

                    $request->session()->put("user", $userLogged);

                    return redirect("/home")->with("msg", "You logged in successfully!");
                }
            } else {
                \Log::warning('Couldnt log in user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
                return redirect("/login")->with("msg", "Try again in couple of minutes!");
            }
        } else {
            \Log::warning('Couldnt log in user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
            return redirect("/login")->with("msg", "Something went wrong, please try again!");
        }
    }
}
