<?php

namespace App\Http\Controllers\API;

use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\UserAnswerResource;
use App\Repositories\UserAnswerRepository;

class UserAnswerController extends Controller
{
    public $userAnswerRepository;

    public function __construct(UserAnswerRepository $userAnswerRepository)
    {
        $this->userAnswerRepository = $userAnswerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userAnswers = $this->userAnswerRepository->allUserAnswer($request);

        return UserAnswerResource::collection($userAnswers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userAnswer = $this->userAnswerRepository->createUserAnswer($request);
        if (!$userAnswer) {
            return response()->json([
                'message' => 'Sorry, Your page was expired.',
            ], 404);
        }

        return new UserAnswerResource($userAnswer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userAnswer = $this->userAnswerRepository->findById($id);
        if (!$userAnswer) {
            return response()->json([
                'message' => 'Sorry, Your answer not found.',
            ], 404);
        }

        $userAnswer = $this->userAnswerRepository->updateUserAnswer($request, $userAnswer);
        return new UserAnswerResource($userAnswer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userAnswer = $this->userAnswerRepository->findById($id);
        if (!$userAnswer) {
            return response()->json([
                'message' => 'Sorry, Your answer not found.',
            ], 404);
        }

        $userAnswer = $this->userAnswerRepository->deleteUserAnswer($id);
        return response()->json([
            'message' => 'Congratulation, You have deleted your answer.',
        ], 200);
    }
}
