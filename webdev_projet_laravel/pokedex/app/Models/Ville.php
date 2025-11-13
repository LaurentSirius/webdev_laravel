<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'villes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'bigint';

    protected $fillable = ['id', 'name', 'champion'];

    public function champion()
    {
        return $this->belongsTo(Dresseur::class, 'champion', 'id');
    }
}
