<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('pokemon')->group(function () {
    Route::get('/', [PokemonController::class, 'getPokedexList']);
    Route::get('/{id}', [PokemonController::class, 'show']);
});

