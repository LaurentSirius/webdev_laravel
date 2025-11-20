<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasOne;

    class Dresseur extends Model {
        protected $table = 'dresseurs';
        protected $primaryKey = 'id';
        /*public $incrementing = false;*/
        public $incrementing = true; // Pas sur du tout non plus TODO
        protected $keyType = 'int';

        /*protected $fillable = ['id', 'name', 'type'];*/
        protected $fillable = ['name', 'type']; // 'type' = foreign key vers types.id

        // Le type préféré du dresseur (ex: Eau, Feu…)
        public function type(): BelongsTo {
            return $this->belongsTo(Type::class, 'type');
        }

        // La ville dont il est champion (inverse de Ville::champion)
        public function villeChampionne(): HasOne {
            return $this->hasOne(Ville::class, 'champion');
        }
    }
