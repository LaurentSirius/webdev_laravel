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

Route::get('/trainer', [TrainerController::class, 'index']);
Route::get('/trainer/{id}', [TrainerController::class, 'show']);
Route::post('/trainer', [TrainerController::class, 'create']);
Route::patch('/trainer/{id}', [TrainerController::class, 'update']);
Route::delete('/trainer/{id}', [TrainerController::class, 'delete']);

Route::get('/city', [CityController::class, 'index']);
Route::get('/city/{id}', [CityController::class, 'show']);
Route::post('/city', [CityController::class, 'create']);
Route::patch('/city/{id}', [CityController::class, 'update']);
Route::delete('/city/{id}', [CityController::class, 'delete']);
