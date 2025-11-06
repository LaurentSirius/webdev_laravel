<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $fillable = ['name', 'type'];

    public function type(): HasOne {
        return $this->hasOne(Type::class, 'id', 'type');
    }

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }
}
