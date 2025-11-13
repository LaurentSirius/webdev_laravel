<?php

    use App\Http\Controllers\PokemonController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('pokemon')->name('pokemon.')->group(function () {
        Route::get('/', [PokemonController::class, 'getPokedexList'])->name('index');
        Route::get('/create', [PokemonController::class, 'createForm'])->name('create');
        Route::post('/create', [PokemonController::class, 'store'])->name('store');
        Route::get('/{id}', [PokemonController::class, 'show'])->name('show');
        Route::post('/', [PokemonController::class, 'create'])->name('create'); // Gardé pour API, mais si pure web, supprime
    });
