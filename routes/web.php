<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contacts/search', [ContactController::class, 'search'])->name('contacts.search');

Route::resource('contacts', ContactController::class);
