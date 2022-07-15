<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



	Route::post('/loginapi', [AuthController::class, 'login'])->name('loginapi');

	Route::post('/pruebaruta', [AuthController::class, 'pruebaruta'])->name('pruebaruta');
	