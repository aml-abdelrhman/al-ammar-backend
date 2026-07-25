<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FigureController;
use App\Http\Controllers\Api\NobleFigureController;
use App\Http\Controllers\Api\NotableMemberController;
use App\Http\Controllers\Api\ScholarController;
use App\Http\Controllers\Api\CharityInitiativeController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\DigitalLibraryController;

Route::get('/figures', [FigureController::class, 'index']);
Route::get('/noble-figures', [NobleFigureController::class, 'index']);
Route::get('/notable-members', [NotableMemberController::class, 'index']);
Route::get('/scholars', [ScholarController::class, 'index']);
Route::get('/charity-initiatives', [CharityInitiativeController::class, 'index']);

Route::post('/donations', [DonationController::class, 'store']);
Route::get('/payment/success-simulation/{id}', [DonationController::class, 'simulateSuccess'])->name('payment.simulate.success');
Route::get('/digital-library', [DigitalLibraryController::class, 'index']);
Route::get('/books/{id}', [DigitalLibraryController::class, 'show']);
