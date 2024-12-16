<?php

use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'linking'])->name(name:'feedback');

Route::post('/check', [MainController::class, 'form_check']);