<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CreatePokemonFormRequest;
    use App\Models\Pokemon;
    use App\Models\Type;
    use App\Repositories\PokemonRepository;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class PokemonController extends Controller {
        // === API METHODS (JSON) ===

        public function index(): JsonResponse {
            try {
                $result = app(PokemonRepository::class)->index();
                return response()->json($result);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function show(int $id): View|JsonResponse {
            try {
                $result = app(PokemonRepository::class)->show($id, ['description', 'types']);
                return view('pokemon_details', ['pokemon' => $result]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No entity for given id'], 404);
            } catch (\Exception $e) {
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
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function create(Request $request): JsonResponse {
            try {
                $result = app(PokemonRepository::class)->create($request->all());
                return response()->json($result, 201);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }

        public function update(Request $request, int $id): JsonResponse {
            try {
                $result = app(PokemonRepository::class)->update($id, $request->all());
                return response()->json($result);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }

        public function getByName(string $name): JsonResponse {
            try {
                $result = app(PokemonRepository::class)->findByName($name);
                return response()->json($result);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 400);
            }
        }

        // === WEB VIEWS (HTML) ===

        public function getPokedexList(): View {
            $pokemon = app(PokemonRepository::class)->getPokedexList();
            return view('pokemon.list', compact('pokemon'));
        }

        // === FORMULAIRE DE CRÉATION ===

        /**
         * Affiche le formulaire de création
         */
        public function createForm(): View {
            $types = Type::all();
            return view('pokemon.createPokemonForm', compact('types'));
        }

        /**
         * Traite la soumission du formulaire
         */
        public function store(CreatePokemonFormRequest $request): RedirectResponse {
            try {
                // Le Repository gère TOUT : pokemon + description + types/faiblesses
                $pokemon = app(PokemonRepository::class)->create($request->validated());

                return redirect()
                    ->route('pokemon.index')
                    ->with('success', 'Pokémon créé avec succès !');

            } catch (\Exception $e) {
                \Log::error('STORE ERROR', ['error' => $e->getMessage()]);
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['error' => 'Échec : ' . $e->getMessage()]);
            }
        }
    }
