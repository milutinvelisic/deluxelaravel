<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Get routes

// use Illuminate\Routing\Route;

Route::get('/', "HomeController@index");
Route::get('/home', "HomeController@index");
Route::get('/rooms', "RoomsController@index");
Route::get("/checkRoom", "RoomsController@checkRoom");
Route::get("/filterRoom", "RoomsController@filterRoom");
Route::get('/restaurant', "RestaurantController@index");
Route::get('/about', "AboutController@index");
Route::get('/contact', "ContactController@index");
Route::get('/completeReservation', "CompleteReservationController@index");
Route::get('/blog', "BlogController@index");
Route::get('/search', "BlogController@search");
Route::get('/searchWord', "BlogController@numberOfLinks");
Route::get('/login', "LoginController@index");
Route::get('/register', "LoginController@registerPage");
Route::get('/resetPassword/{token}', "LoginController@showForm");
Route::get("/logout", "LoginController@logout")->middleware(["LoggedIn"]);
Route::get("/contactAdmin", "ContactAdminController@sendMail");


Route::prefix('/admin')->middleware(["LoggedIn", "IsAdmin"])->group(function () {
    Route::get('/home', "Admin\HomeController@index");
    Route::resource('/users', "Admin\UsersController");
    Route::resource('/rooms', "Admin\RoomsController");
});

Route::fallback(function () {
    return view("pages.home");
});

//Post routes

Route::post('/login', "LoginController@login");
Route::post('/register', "LoginController@register");
Route::post('/resetPassword', "LoginController@resetPassword");
Route::post('/changePassword', "LoginController@changePasswordMethod");
Route::post('/insertReservation', "CompleteReservationController@insertReservation");

//Complex routes

Route::get("/rooms/{id}", "RoomsController@getRoom")->where(["id" => "\d+"])->name("SingleRoom");
