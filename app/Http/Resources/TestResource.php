<?php

namespace App\Http\Resources;

use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function timeCountDown($request) 
    {
        $result = Result::UserId($request->user_id)->TestId($this->id)->first();

        // if ($result) {
        //     $timeNow = Carbon::now();
        //     $timeStarted = Carbon::parse($result->started_at); 
        //     $examDuration = Carbon::parse($this->duration); 
        // }

        return 90;
    }

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "date" => $this->DateFormat,
            "duration" => $this->DurationFormat,
            "description" => $this->description,
            "time_countdown" => $this->timeCountDown($request)
        ];
    }
}
