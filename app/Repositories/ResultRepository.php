<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Result;
use App\Repositories\BaseRepository;

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

    public function createResult($request) 
    {
        $userId = $request->user_id;
        $testId = $request->test_id;
        $startedAt = Carbon::now();

        // FIND THE EXAM USER'S RESULT
        $result = Result::UserId($userId)->TestId($testId)->first();
        if (!$result) {
            $result = $this->model->create([
                "user_id" => $userId,
                "test_id" => $testId,
                "started_at" => $startedAt
            ]);
        }

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
