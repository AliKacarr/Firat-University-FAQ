<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;

Route::get('/', function () {
    return view('index');
});

Route::get('/faq/all', [FaqController::class, 'getAllFaqs']);
