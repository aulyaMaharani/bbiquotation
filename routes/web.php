<?php

use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index'); // Menggunakan titik (.) sebagai pemisah folder
})->name('landing');

Route::get('/quotation/create', [QuotationController::class, 'create'])->name('quotation.create');
Route::post('/quotation/store', [QuotationController::class, 'store'])->name('quotation.store');
// Tambahkan ini di web.php
Route::get('/quotation', [QuotationController::class, 'create']);
