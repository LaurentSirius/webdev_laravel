<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dresseur extends Model
{
    protected $table = 'dresseurs';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'bigint';

    protected $fillable = ['id', 'name', 'type'];

    public function ville()
    {
        return $this->hasOne(Ville::class, 'champion');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type', 'id');
    }
}
