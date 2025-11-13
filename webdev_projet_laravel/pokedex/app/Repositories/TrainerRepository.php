<?php

namespace App\Repositories;

use App\Models\Dresseur;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TrainerRepository extends BaseRepository
{
    public function __construct(Dresseur $model)
    {
        parent::__construct($model);
    }

    public function index(): Collection
    {
        return $this->model->with('type', 'ville')->get();
    }

    public function show($id, array $relations = []): Model
    {
        return $this->model->with('type', 'ville')->find($id);
    }
}
