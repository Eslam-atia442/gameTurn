<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GameTurnRequest;
use App\Services\GameTurnService;
use Illuminate\Http\Request;

class GameTurnController extends Controller
{
    public GameTurnService $service;

    public function __construct(GameTurnService $service)
    {
        $this->service = $service;
    }

    public function index(GameTurnRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->service->getTurns($request->validated());

        if ($data['turns'])
            return response()->json([
                'turns' => $data['turns']
            ]);
        else
            return response()->json(['error' => $data['message']], 400);

    }
}
