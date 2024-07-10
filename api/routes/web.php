<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalcController;

Route::get('/', function () {
    return view('welcome');
});

// Route for addition, subtraction, multiplication and division
Route::post('add', [CalcController::class, 'add']);
Route::post('sub', [CalcController::class, 'sub']);
Route::post('mul', [CalcController::class, 'mul']);
Route::post('div', [CalcController::class, 'div']);

Route::get('/get-csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

// Route to get all the operations
Route::get('/operations', [CalcController::class, 'operations']);

