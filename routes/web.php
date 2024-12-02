<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ToDoList;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('to-do-list', ToDoList::class)->name('to-do-list');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
