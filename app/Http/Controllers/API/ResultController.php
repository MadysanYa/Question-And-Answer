<?php

namespace App\Http\Controllers\API;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\ResultResource;
use App\Repositories\ResultRepository;
use App\Repositories\UserAnswerRepository;

class ResultController extends Controller
{
    public $resultRepository;
    public $userAnswerRepository;

    public function __construct(ResultRepository $resultRepo, UserAnswerRepository $userAnswerRepo)
    {
        $this->resultRepository = $resultRepo;
        $this->userAnswerRepository = $userAnswerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = $this->resultRepository->allResult($request);

        return ResultResource::collection($results);
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
        //
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

    public function showUser(Request $request)
    {
        $userAnswer = $this->userAnswerRepository->calculateResultByUserIdAndTestId($request);
        if (!$userAnswer) {
            return response()->json(['message' => 'Sorry, Your result not found.'], 404);
        }

        $result = $this->resultRepository->findByUserIdAndTestId($request);
        if (!$result) {
            return response()->json(['message' => 'Sorry, Your result not found.'], 404);
        }

        return new ResultResource($result);
    }

    public function resultIsRead(Request $request)
    {
        $result = $this->resultRepository->findByUserIdAndTestId($request);
        if (!$result) {
            return response()->json(['message' => 'Sorry, Your result not found.'], 404);
        }

        return new ResultResource($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
