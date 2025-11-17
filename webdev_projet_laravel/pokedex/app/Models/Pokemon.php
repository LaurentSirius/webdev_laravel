<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Pokemon extends Model {
        protected $fillable = [
            'number', 'name', 'hp', 'attack', 'defense', 'speed',
            'size', 'weight', 'sex', 'description',
            'evolve_from', 'evolve_to'
        ];

        // Types du Pokémon
        public function types(): BelongsToMany {
            return $this->belongsToMany(Type::class, 'pokemon_types_weaknesses')
                ->wherePivot('is_weakness', 0);
        }

        // Faiblesses du Pokémon
        public function weaknesses(): BelongsToMany {
            return $this->belongsToMany(Type::class, 'pokemon_types_weaknesses')
                ->wherePivot('is_weakness', 1);
        }

        // Tous les liens (types + faiblesses) – utilisé pour sync()
        public function typesAndWeaknesses(): BelongsToMany {
            return $this->belongsToMany(Type::class, 'pokemon_types_weaknesses')
                ->withPivot('is_weakness');
        }
    }
