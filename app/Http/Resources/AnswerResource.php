<?php

namespace App\Http\Resources;

use App\Models\UserAnswer;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function checkUserTicked($request) {
        $userAnswer = UserAnswer::where("user_id", $request->user_id)
                                ->where("test_id", $request->test_id)
                                ->where("question_id", $this->question_id)
                                ->where("answer_id", $this->id)
                                ->first();

        if (!$userAnswer) {  return false; }

        return true;
    }

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "question_id" => $this->question_id,
            "is_correct" => $this->is_correct,
            "answer_text" => $this->answer_text,
            "user_ticked" => $this->checkUserTicked($request)
        ];
    }
}
