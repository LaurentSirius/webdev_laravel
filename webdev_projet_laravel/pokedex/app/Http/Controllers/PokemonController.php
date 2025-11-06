<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePokemonFormRequest;
use App\Repositories\PokemonRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mockery\Exception;

class PokemonController extends Controller
{
    public function index(): View|JsonResponse {
        try {
            $result = app(PokemonRepository::class)->index();
            return response()->json($result);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getPokedexList(): View|JsonResponse {
        try {
            $result = app(PokemonRepository::class)->getPokedexList();
            return view('pokemon', ['pokemons' => $result]);
            //return response()->json($result);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show(int $id): View | JsonResponse {
        try {
            $result = app(PokemonRepository::class)->show($id, ['description', 'types']);
            return view('pokemon_details', ['pokemon' => $result]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'No entity for given id'], 404);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete(int $id): JsonResponse {
        try {
            app(PokemonRepository::class)->delete($id);
            return response()->json(['message' => 'success']);
        } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No entity for given id'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function create(Request $request): JsonResponse {
        try {
            $result = app(PokemonRepository::class)->create($request->all());
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, int $id): JsonResponse {
        try {
            $result = app(PokemonRepository::class)->update($id, $request->all());
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getByName(string $name): JsonResponse {
        try {
            $result = app(PokemonRepository::class)->getByHPAndAttack();
            return response()->json($result);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function createForm(CreatePokemonFormRequest $request): View {
        dd($request->all());
        return view('pokemon.createForm');
    }
}
