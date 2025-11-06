<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pokemon extends Model
{
    protected $table = 'pokemon';
    protected $primaryKey = 'id';

   protected $fillable = [
       'number',
        'name',
        'HP',
        'attack',
        'defense',
        'speed',
        'evolve_from',
        'evolve_to',
        'evolution_step'
   ];

    #region RELATIONS

    // Relation one-to-one avec la PokemonDescription
    public function description(): HasOne
    {
        return $this->hasOne(PokemonDescription::class);
    }

    // Relation many-to-many avec la table types (au travers de la table pokemon_types_weaknesses)
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'pokemon_types_weaknesses')
            ->withPivot('is_weakness');
    }
    #endregion
}
