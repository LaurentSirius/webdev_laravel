<?php

namespace App\Repositories;

use App\Models\PokemonDescription;

class PokemonDescriptionRepository extends BaseRepository
{
    public function __construct(PokemonDescription $pokemonDescription)
    {
        parent::__construct($pokemonDescription);
    }
}
