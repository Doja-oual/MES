<?php

use App\Models\articale;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('\articales',articale::class);
