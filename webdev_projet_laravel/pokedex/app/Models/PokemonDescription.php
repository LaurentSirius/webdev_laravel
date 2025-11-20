<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class PokemonDescription extends Model {
        protected $table = 'pokemon_descriptions';
        protected $primaryKey = 'pokemon_id';

        protected $fillable = ['pokemon_id', 'size', 'weight', 'sex', 'description'];

        #region RELATIONS

        // la description n'appartient qu'à un et un seul pokemon.
        public function pokemon(): BelongsTo {
            return $this->belongsTo(Pokemon::class, 'pokemon_id');
        }
        #endregion
    }
