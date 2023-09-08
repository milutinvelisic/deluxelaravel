<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('pages.stripe.index');
    }

    public function checkout(Request $request)
    {
        $dateFrom = $request->input("crDateFromHidden");
        $dateTo = $request->input("crDateToHidden");
        $crRoomType = $request->input("crRoomTypeHidden");
        $crUsername = $request->input("crUsername");
        $crPassword = $request->input("crPassword");
        $crEmail = $request->input("crEmail");
//        dd([
//            $dateFrom,
//            $dateTo,
//            $crRoomType,
//            $crUsername,
//            $crPassword,
//            $crEmail,
//        ]);

        $userModel = new User();
        $roomModel = new Rooms();

        $user = $userModel->getUserForEmail($crEmail);

        if (!$user) {

            $user = $userModel->registerUser($crUsername, $crEmail, $crPassword);

            if (!$user) {
                \Log::warning('Couldnt register user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());

                return redirect("/completeReservation")->with("msg", "There has been error with server, please try again later!");
            } else {
                $idUser = $userModel->getUserIdFromEmail($crEmail);

                $room = $roomModel->insertReservation($dateFrom, $dateTo, $crRoomType, $idUser->idUser);
                $singleRoom = Rooms::where('idRoom', $crRoomType)->first();

                \Stripe\Stripe::setApiKey(config('stripe.sk'));

                $session = \Stripe\Checkout\Session::create([
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => 'eur',
                                'product_data' => [
                                    'name' => "Paying for room $singleRoom->roomName",
                                ],
                                'unit_amount' => $singleRoom->roomPrice * 100,
                            ],
                            'quantity' => 1
                        ],
                    ],
                    'mode' => 'payment',
                    'success_url' => route('success'),
                    'cancel_url' => route('stripe_index'),
                ]);

                return redirect()->away($session->url);
//
//                if ($room) {
//                    return redirect()->back()->with("msg", "Successfully reserved! Have a nice day!")->with('success', true);
//                } else {
//                    \Log::warning('Error inserting room to reservedrooms at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
//                    return redirect("/completeReservation")->with("msg", "There has been error, please try again later!");
//                }
            }
        } else {
            $idUser = $userModel->getUserIdFromEmail($crEmail);

            $room = $roomModel->insertReservation($dateFrom, $dateTo, $crRoomType, $idUser->idUser, 1);
            $singleRoom = Rooms::where('idRoom', $crRoomType)->first();

            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'eur',
                            'product_data' => [
                                'name' => "Paying for room $singleRoom->roomName",
                            ],
                            'unit_amount' => $singleRoom->roomPrice * 100,
                        ],
                        'quantity' => 1
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('stripe_index'),
            ]);

            return redirect()->away($session->url);

//            if ($room) {
//                return redirect()->back()->with("msg", "Successfully reserved! Have a nice day!")->with('success', true);
//            } else {
//                \Log::warning('Error inserting room to reservedrooms at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
//                return redirect("/completeReservation")->with("msg", "There has been error, please try again later!");
//            }
        }
    }

    public function success()
    {
        return view('pages.stripe.success');
    }
}
