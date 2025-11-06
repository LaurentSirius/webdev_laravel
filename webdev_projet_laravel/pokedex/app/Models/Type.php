<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'id';


    #region RELATIONS
    // Relation many-to-many avec la table types (au travers de la table pokemon_types_weaknesses)
    public function pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_types_weaknesses')
            ->withPivot('is_weakness');
    }

    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(Trainer::class);
    }
    #endregion
}
