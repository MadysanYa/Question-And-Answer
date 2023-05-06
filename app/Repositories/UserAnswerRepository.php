<?php

namespace App\Repositories;

use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserAnswerRepository.
 */
class UserAnswerRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return UserAnswer::class;
    }

    public function findById($id) 
    {
        return UserAnswer::find($id);
    }

    public function allUserAnswer($request) 
    {
        $query = $this->model;
        
        // FILTER
        if ($request->user_id) {
            $query = $query->whereUserId($request->user_id);
        }

        $query = $query->get();
        return $query;
    }

    public function createUserAnswer($request) 
    {
        $userAnswer = UserAnswer::create([
            "user_id" => $request->user_id,
            "test_id" => $request->test_id,
            "question_id" => $request->question_id,
            "answer_id" => $request->answer_id
        ]);

        return $userAnswer;
    }

    public function updateUserAnswer($request, $userAnswer)
    {
        $userAnswer->update([
            "answer_id" => $request->answer_id
        ]);
        
        return $userAnswer;
    }

    public function deleteUserAnswer($id)
    {
        return UserAnswer::whereId($id)->delete();
    }
}
