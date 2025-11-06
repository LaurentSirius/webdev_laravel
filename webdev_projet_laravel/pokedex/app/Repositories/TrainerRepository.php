<?php

namespace App\Repositories;

use App\Models\Trainer;

class TrainerRepository extends BaseRepository
{
    public function __construct(Trainer $trainer)
    {
        parent::__construct($trainer);
    }
}
