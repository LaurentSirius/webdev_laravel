<?php

    use App\Http\Controllers\CityController;
    use App\Http\Controllers\PokemonController;
    use App\Http\Controllers\TrainerController;
    use App\Http\Controllers\TypeController;
    use App\Http\Controllers\PokemonDescriptionController;
    use Illuminate\Support\Facades\Route;

    //<editor-fold desc="pokemon">
    Route::prefix('pokemon')->group(function () {
        Route::get('/name/{name}', [PokemonController::class, 'getByName']);
        Route::get('/{id}', [PokemonController::class, 'show']);
        Route::patch('/{id}', [PokemonController::class, 'update']);
        Route::delete('/{id}', [PokemonController::class, 'delete']);
        Route::get('/', [PokemonController::class, 'index']);
        Route::post('/', [PokemonController::class, 'create']);
    });
    //</editor-fold>
    Route::prefix('type')->group(function () {
        Route::get('/{id}', [TypeController::class, 'show']);
        Route::patch('/{id}', [TypeController::class, 'update']);
        Route::delete('/{id}', [TypeController::class, 'delete']);
        Route::get('/', [TypeController::class, 'index']);
        Route::post('/', [TypeController::class, 'create']);
    });

    Route::prefix('pokemon-description')->group(function () {
        Route::get('/{id}', [PokemonDescriptionController::class, 'show']);
        Route::patch('/{id}', [PokemonDescriptionController::class, 'update']);
        Route::delete('/{id}', [PokemonDescriptionController::class, 'delete']);
        Route::get('/', [PokemonDescriptionController::class, 'index']);
        Route::post('/', [PokemonDescriptionController::class, 'create']);
    });

    Route::prefix('city')->group(function () {
        Route::get('/', [CityController::class, 'index']);
        Route::get('/{id}', [CityController::class, 'show']);
        Route::post('/', [CityController::class, 'create']);
        Route::put('/{id}', [CityController::class, 'update']);
        Route::delete('/{id}', [CityController::class, 'delete']);
    });

    Route::prefix('trainer')->group(function () {
        Route::get('/', [TrainerController::class, 'index']);
        Route::get('/{id}', [TrainerController::class, 'show']);
        Route::post('/', [TrainerController::class, 'create']);
        Route::put('/{id}', [TrainerController::class, 'update']);
        Route::delete('/{id}', [TrainerController::class, 'delete']);
    });
