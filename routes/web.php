<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/*
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

#################################
###         -- PAGES --       ###
#################################
Route::get('/', 'PagesController@home');

Route::get('/contact','PagesController@contact');
Route::post('/sendmail', 'PagesController@sendMail');

//gallery
Route::get('/gallery','PagesController@gallery');
Route::get('/gallery/roosterfish','PagesController@roosterfish');
Route::get('/gallery/wahoo','PagesController@wahoo');
Route::get('/gallery/tuna','PagesController@tuna');
Route::get('/gallery/marlin','PagesController@marlin');
Route::get('/gallery/mahi-mahi','PagesController@mahi_mahi');
Route::get('/gallery/red-snapper','PagesController@red_snapper');
Route::get('/gallery/amberjack','PagesController@amberjack');
Route::get('/gallery/jack-trevally','PagesController@jack_trevally');


//TOURS
Route::get('/tours/sunset','PagesController@sunset');
Route::get('/tours/snorkel','PagesController@snorkel');
Route::get('/tours/whale-watching','PagesController@whale_watching');

// FISHING REPORT
Route::get('/fishing-report-home','PagesController@index')->name('fishing-report-home');



#################################
###  --ALL VIEWS FOR PANGAS-- ###
#################################
#ALL PANGAS
Route::get('/pangas', 'PangasController@home');
#BOOK SPECIFIED PANGA
Route::get('/book-now/panga/{id}', 'PangasController@bookPanga')->name('panga-id');
Route::get('/book-now/panga/{id}/{price}', 'PangasController@bookPangaWithPrice');
Route::post('/reserve-panga','PangasController@reservePanga');
#BOOK NOW ONLY FOR PANGAS IN GENERAL
Route::get('/book-now', 'PangasController@bookRandomPanga');
#GET PANGAS PRICES
Route::post('/getPangaPrice','PangasController@getPrice');


###################################
###  --ALL VIEWS FOR CHARTERS-- ###
###################################
Route::get('/charters', 'ChartersController@home');
#SHOW SPECIFIED CHARTER
Route::get('charter/{id}', 'ChartersController@showCharter')->name('charter-id');
#BOOK SPECIFIED CHARTER
Route::get('/book-now/charter/{id}', 'ChartersController@bookCharter');
Route::get('/book-now/charter/{id}/{price}', 'ChartersController@bookCharterWithPrice');
#GET CHARTERS PRICES
Route::post('/getCharterPrice','ChartersController@getPrice');




//PAYPAL PAYMENT
Route::get('/reservation/completed/{orderID}','PangasController@getOrder');
Route::get('/paypal-reservation/completed/{orderID}','GetOrder@getOrder');
Route::get('/tour-reservation/completed/{orderID}','GetOrder@getOrderTour');
// Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
// Route::get('/paypal/status', 'PaymentController@payPalStatus');
// CASH ON ARRIVAL
Route::post('/reserve-tour','GetOrder@cashOnArrival')->name('reserveTour');

#PANEL SYSTEM
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::resource('/fishing-report-cabo', 'ArticleController');


Route::get('debug','PagesController@debug');