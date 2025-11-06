<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name', 'champion'];

    public function champion(): HasOne
    {
        return $this->hasOne(Trainer::class, 'id', 'champion');
    }
}
