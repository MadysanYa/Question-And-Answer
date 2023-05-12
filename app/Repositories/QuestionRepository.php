<?php

namespace App\Repositories;

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
        return $this->model->whereTestId($request->test_id)->get();
    }
}
