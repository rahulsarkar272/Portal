<?php

use Illuminate\Support\Facades\Route;
use App\Mail\contactEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
Route::get('/testroute', function() {
    $name = "Funny Coder";

    // The email sending is done using the to method on the Mail facade
    Mail::to('djrahulsarkar55@gmail.com')->send(new contactEmail($name));
});
