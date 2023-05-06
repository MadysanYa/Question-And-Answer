<?php

namespace App\Repositories;

use App\Models\Result;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ResultRepository.
 */
class ResultRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Result::class;
    }

    public function allResult($request) 
    {
        $query = $this->model;
        
        // FILTER
        if ($request->user_id) {
            $query = $query->whereUserId($request->user_id);
        }

        $query = $query->get();
        return $query;
    }
}
