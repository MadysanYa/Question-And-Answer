<?php

namespace App\Repositories;

use App\Models\Test;
use App\Models\Question;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

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
