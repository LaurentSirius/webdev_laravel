<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ville extends Model
{
    protected $table = 'villes';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'bigint';

    protected $fillable = ['name', 'champion'];

    public function champion(): BelongsTo
    {
        return $this->belongsTo(Dresseur::class, 'champion');
    }
}
