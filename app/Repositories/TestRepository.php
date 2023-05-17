<?php

namespace App\Repositories;

use App\Models\Test;
use App\Repositories\BaseRepository;

/**
 * Class TestRepository.
 */
class TestRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Test::class;
    }

    public function findById($id) 
    {
        return $this->model->find($id);
    }

    public function allTest()
    {
        $query = $this->model->where("is_active", true)->whereHas("questions")->get();
        return $query;
    }
}
