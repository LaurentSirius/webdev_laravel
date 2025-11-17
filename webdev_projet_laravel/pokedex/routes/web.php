<?php

    use App\Http\Controllers\PokemonController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    /*Route::prefix('pokemon')->name('pokemon.')->group(function () {
        Route::get('/', [PokemonController::class, 'getPokedexList'])->name('index');
        Route::get('/create', [PokemonController::class, 'createForm'])->name('create');
        Route::post('/create', [PokemonController::class, 'store'])->name('store');
        Route::get('/{id}', [PokemonController::class, 'show'])->name('show');
        Route::post('/', [PokemonController::class, 'create'])->name('create'); // Gardé pour API, mais si pure web, supprime
    });*/

    // === USERS ===
    Route::prefix('users')->group(function () {
        Route::get('/create-user', [UserController::class, 'createUserForm'])->name('users.create-user');
        Route::post('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/login', [UserController::class, 'loginForm'])->name('login');
        Route::post('/login', [UserController::class, 'login'])->name('users.login');
    });

    // === POKÉMON ===
    Route::prefix('pokemon')->group(function () {
        /*Route::get('/create', [PokemonController::class, 'createForm']);
        Route::post('/', [PokemonController::class, 'store'])->name('pokemon.store');
        Route::get('/{id}', [PokemonController::class, 'show'])->name('pokemon.show');
        Route::get('/', [PokemonController::class, 'getPokedexList'])->name('pokemon.list');
        Route::post('/', [PokemonController::class, 'create'])->name('pokemon.create');

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

        /*Route::get('/', [PokemonController::class, 'getPokedexList'])->name('pokemon.list');*/
        Route::get('/', [PokemonController::class, 'getPokedexList'])->name('pokemon.index');

        Route::post('/', [PokemonController::class, 'store'])->name('pokemon.store');

        // Toujours en dernier !
        Route::get('/{id}', [PokemonController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('pokemon.show');
    });
