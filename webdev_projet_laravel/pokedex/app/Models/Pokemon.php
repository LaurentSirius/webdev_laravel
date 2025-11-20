<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\HasOne;

    class Pokemon extends Model {
        protected $table = 'pokemon';
        protected $fillable = [
            'number', 'name', 'hp', 'attack', 'defense', 'speed',
            /*'size', 'weight', 'sex', 'description',*/
            'evolve_from', 'evolve_to', 'evolution_step'
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
        public function allTypesAndWeaknesses(): BelongsToMany {
            return $this->belongsToMany(Type::class, 'pokemon_types_weaknesses')
                ->withPivot('is_weakness');
        }

        public function descriptions(): HasOne {
            return $this->hasOne(PokemonDescription::class);
        }

        public function evolveFrom(): BelongsTo {
            return $this->belongsTo(Pokemon::class, 'evolve_from');
        }

        public function evolveTo(): BelongsTo {
            return $this->belongsTo(Pokemon::class, 'evolve_to');
        }
    }
