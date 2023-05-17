<?php

namespace App\Repositories;

use App\Models\Test;
use App\Models\Question;
use App\Repositories\BaseRepository;

/**
 * Class QuestionRepository.
 */
class QuestionRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Question::class;
    }

    public function allQuestion($request) 
    {   
        $examId = $request->test_id;
        $showTotal = 100;

        $exam = Test::find($examId);
        if ($exam) {
            $showTotal = $exam->show_total;
        }

        return $this->model
                ->whereTestId($request->test_id)
                ->inRandomOrder()
                ->limit($showTotal)
                ->get();
    }
}
