<?php

use App\Http\Controllers\Master\CondominioController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('master');
});

Route::resource('condominios',CondominioController::class)->names('condominios');
