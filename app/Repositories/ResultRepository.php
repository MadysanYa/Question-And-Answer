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

    public function findByUserIdAndTestId($request) 
    {
        return  $this->model->whereUserId($request->user_id)
                            ->whereTestId($request->test_id)
                            ->whereNotNull("score")
                            ->first();
    }

    public function createResult($request, $score) 
    {
        $result = $this->model->create([
            "user_id" => $request->user_id,
            "test_id" => $request->test_id,
            "score" => $score,
            "time_taken" => $request->time_taken
        ]);
        
        return $result;
    }

    public function updateResult($result, $score)
    {
        $result->update([
            "score" => $score
        ]);
        
        return $result;
    }
}
