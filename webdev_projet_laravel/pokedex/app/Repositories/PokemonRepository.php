<?php

namespace App\Repositories;

use App\Http\Resources\PokemonListResource;
use App\Models\Pokemon;
use App\Models\PokemonDescription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PokemonRepository extends BaseRepository
{
    public function __construct(Pokemon $pokemon)
    {
        parent::__construct($pokemon);
    }


    public function create(array $args): Pokemon
    {
        $pokemonData = Arr::only($args, $this->model->getFillable());
        $descriptionData = Arr::only($args, (new PokemonDescription())->getFillable());

        /** @var Pokemon $pokemon */
        $pokemon = parent::create($pokemonData);
        $pokemon->description()->create($descriptionData);

        // on attend un tableau contenant les types dans $args
        // tableau structuré comme suit :
        // [ type_id => ['is_weakness' => true/false], ... ]
        // exemple : [ 1 => ['is_weakness' => false]]
        if (!empty($args['types']) && is_array($args['types'])) {
            $pokemon->types()->attach($args['types']);
        }

        return $pokemon->fresh(['description', 'types']);
    }

    public function update(int $id, array $args): Pokemon
    {
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

    public function getByName(string $name): Pokemon
    {
        $pokemon = $this->model->where('name', $name)->first();
        return $pokemon;
    }

    // tous les pokemon qui ont HP > 40  et attaque < 30
    public function getByHPAndAttack(): Collection
    {
        $pokemon = $this->model
            ->where('HP', '>', 40) //qui ont HP > 40
            ->where('attack', '<', 30) //et attaque < 30
            ->get();

        return $pokemon;
    }

    public function getPokedexList(): Collection
    {
        return Pokemon::with(['types'])->select([
            'id',
            'name',
            'number',
        ])->get();
    }

}
