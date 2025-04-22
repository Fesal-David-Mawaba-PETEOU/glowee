<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use Livewire\Volt\Volt;

Route::get('/', HomePage::class);
