<?php

    namespace App\Repositories;

    use App\Http\Resources\PokemonListResource;
    use App\Models\Pokemon;
    use App\Models\PokemonDescription;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Http\Resources\Json\JsonResource;
    use Illuminate\Support\Arr;
    use Illuminate\Database\Eloquent\Model;

    class PokemonRepository extends BaseRepository {
        public function __construct(Pokemon $pokemon) {
            parent::__construct($pokemon);
        }

        /**
         * Crée un nouveau Pokémon avec description et types/faiblesses.
         *
         * @param array $args Données incluant pokemonData, descriptionData, et 'types' structuré comme [type_id => ['is_weakness' => bool]]
         * @return Pokemon
         */
        public function create(array $data): Model {
            // Sépare les types et faiblesses
            $types = $data['types'] ?? [];
            $weaknesses = $data['weaknesses'] ?? [];
            unset($data['types'], $data['weaknesses']);

            // Crée le Pokémon
            $pokemon = Pokemon::create($data);

            // Prépare les données pour sync()
            $syncData = [];
            foreach ($types as $typeId) {
                $syncData[$typeId] = ['is_weakness' => 0];
            }
            foreach ($weaknesses as $typeId) {
                $syncData[$typeId] = ['is_weakness' => 1];
            }

            // Sync unique : écrase tout à chaque création (parfait pour un formulaire create)
            $pokemon->typesAndWeaknesses()->sync($syncData);

            // Retourne avec les relations chargées
            return $pokemon->load(['types', 'weaknesses']);
        }

        /**
         * Met à jour un Pokémon existant.
         *
         * @param int $id
         * @param array $args
         * @return Pokemon
         */
        public function update(int $id, array $args): Pokemon {
            $pokemonData = Arr::only($args, $this->model->getFillable());
            $descriptionData = Arr::only($args, (new PokemonDescription())->getFillable());

            /** @var Pokemon $pokemon */
            $pokemon = parent::show($id);
            $pokemon->update($pokemonData);
            $pokemon->description()->update($descriptionData);

            if (!empty($args['types']) && is_array($args['types'])) {
                $pokemon->types()->sync($args['types']); // remplace les types existants par la nouvelle liste
            }

            return $pokemon->fresh(['description', 'types']);
        }

        public function getByName(string $name): Pokemon {
            $pokemon = $this->model->where('name', $name)->first();
            return $pokemon;
        }

        // tous les pokemon qui ont HP > 40  et attaque < 30
        public function getByHPAndAttack(): Collection {
            $pokemon = $this->model
                ->where('HP', '>', 40) //qui ont HP > 40
                ->where('attack', '<', 30) //et attaque < 30
                ->get();

            return $pokemon;
        }

        public function getPokedexList(): Collection {
            return Pokemon::with(['types'])->select([
                'id',
                'name',
                'number',
            ])->get();
        }

        private function formatTypeWeakness(array $data, bool $isWeakness): array {
            $result = [];
            foreach ($data as $typeId) {
                $result[$typeId] = ['is_weakness' => $isWeakness];
            }
            return $result;
        }
    }
