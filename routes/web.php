<?php

use App\Livewire\Counter;
use App\Livewire\Todo;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', Todo::class)->name('home');
Route::get('counter', Counter::class)->name('counter');
Route::get('/post', Counter::class)->name('post');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
