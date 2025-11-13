<?php

namespace App\Repositories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CityRepository extends BaseRepository
{
    public function __construct(Ville $model)
    {
        parent::__construct($model);
    }

    public function index(): Collection
    {
        return $this->model->with('champion.type')->get();
    }

    public function show($id, array $relations = []): Model
    {
        return $this->model->with('champion.type')->find($id);
    }
}
