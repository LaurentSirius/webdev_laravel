<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model {
    protected $table = 'types';
    protected $primaryKey = 'id';
    public $incrementing = false; // important car id est manuel
    protected $keyType = 'bigint';

    // AJOUTE ÇA :
    protected $fillable = ['id', 'name', 'color_code'];
}
