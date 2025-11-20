<?php

    use App\Http\Controllers\PokemonController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect()->route('pokemon.list');
    });

    // === USERS ===
    Route::prefix('users')->group(function () {
        Route::get('/create-user', [UserController::class, 'createUserForm'])->name('users.create-user');
        Route::post('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/login', [UserController::class, 'loginForm'])->name('login');
        Route::post('/login', [UserController::class, 'login'])->name('users.login');
    });

    // === POKÉMON ===
    Route::prefix('pokemon')->middleware('auth')->group(function () {
    /*Route::prefix('pokemon')->group(function () {*/
        /*
        // 1. Routes statiques D'ABORD (create, etc.)
        Route::get('/create', [PokemonController::class, 'createForm']);

        // 2. Route dynamique EN DERNIER (toujours !)
        Route::get('/{id}', [PokemonController::class, 'show'])
            ->where('id', '[0-9]+') // Bonus : force que l'id soit numérique
            ->name('pokemon.show');

        // Les autres routes
        Route::get('/', [PokemonController::class, 'getPokedexList'])->name('pokemon.list');
        Route::post('/', [PokemonController::class, 'store'])->name('pokemon.store');*/

        Route::get('/create', [PokemonController::class, 'createForm']);

        Route::get('/', [PokemonController::class, 'getPokedexList'])->name('pokemon.list');

        Route::post('/', [PokemonController::class, 'store'])->name('pokemon.store');

        // Toujours en dernier !
        Route::get('/{id}', [PokemonController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('pokemon.show');
    });
