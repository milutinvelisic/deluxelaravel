<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactAdminRequest;
use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class ContactAdminController extends Controller
{
    public function sendMail(ContactAdminRequest $request)
    {

        $email = $request->input("email");
        $subject = $request->input("subject");
        $msg = $request->input("msg");

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
            $mail->setFrom('milutinvelisic6@gmail.com', 'Zavrsni rad Contact Form');
            $mail->addAddress($email);  //'milutin.velisic.195.17@ict.edu.rs'   // Add a recipient               // Name is optional
            $mail->addReplyTo('milutinvelisic6@gmail.com', 'Information');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = 'This message: ' . $msg . " has been sent from this email: " . $email;

            $mail->send();


            return redirect()->back()->with("msg", "Email sent!");
        } catch (Exception $e) {
            \Log::warning($e->getMessage());
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

            return redirect('/login')->back()->with("msg", "Error with sending email, please enter valid email!");
        }
    }
}
