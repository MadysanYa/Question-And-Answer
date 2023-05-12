<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\Result;
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

    public function calculateResultByUserIdAndTestId($request) 
    {
        $userId = $request->user_id;
        $testId = $request->test_id;
        $timeTaken = $request->time_taken;
        $score = 0;
        
        // FIND THE EXAM USER'S ANSWER
        $userAnswer = $this->model->where("user_id", $userId)
                            ->where("test_id", $testId)
                            ->get();

        // THE EXAMP USER'S ANSWER NOT FOUND 
        if (!count($userAnswer)) {
            return false;
        }

        // ARRAY ANSWER ID
        $answerAnswerId = $userAnswer->pluck("answer_id");

        // FIND ANSWER THAT CORRECT BY ARRAY ANSWER ID
        $answer = Answer::whereIn("id", $answerAnswerId)->where("is_correct", true)->get();

        // SET SCORE AS ANSWER FOUND
        if (count($answer)) {
            $score = count($answer);
        }

        // FIND THE EXAM USER'S RESULT
        $result = Result::UserId($userId)->TestId($testId)->first();

        // UPDATE THE USER'S RESULT EXIST
        if ($result) {
            return $result->update([
                "score" => $score,
            ]);
            
        // CTEAE THE USER'S RESULT 
        } else {
            return Result::create([
                "user_id" => $userId,
                "test_id" => $testId,
                "score" => $score,
                "time_taken" => $timeTaken
            ]); 
        }        
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
        // CHECK EXISTING ANSWER
        $checkUserAnswer = $this->model->whereUserId($request->user_id)
                                    ->whereTestId($request->test_id)
                                    ->whereQuestionId($request->question_id)
                                    ->first();

        // UPDATE ANSWER
        if ($checkUserAnswer) {
            $userAnswer = $this->updateUserAnswer($request, $checkUserAnswer);

        // CREATE NEW ANSWER
        } else {
            $userAnswer = $this->model->create([
                "user_id" => $request->user_id,
                "test_id" => $request->test_id,
                "question_id" => $request->question_id,
                "answer_id" => $request->answer_id
            ]);
        }
        
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
