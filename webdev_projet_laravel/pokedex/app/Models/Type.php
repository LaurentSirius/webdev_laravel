<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Type extends Model {
        /*public $incrementing = false;*/ // important car id est manuel
        protected $table = 'types';
        public $incrementing = true;        // Laisse Laravel gérer l’auto-incrément (pas sur de ca) TODO
        protected $fillable = ['name', 'color_code'];
    }
