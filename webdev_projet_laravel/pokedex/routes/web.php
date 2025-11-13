<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('pokemon')->group(function () {
    Route::get('/create', [PokemonController::class, 'createForm']);
    Route::get('/{id}', [PokemonController::class, 'show']);
    Route::get('/', [PokemonController::class, 'getPokedexList']);
    Route::post('/', [PokemonController::class, 'create'])->name('pokemon.create');
});

