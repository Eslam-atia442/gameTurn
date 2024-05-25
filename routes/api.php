<?php

use App\Http\Controllers\Api\V1\GameTurnController;
use Illuminate\Support\Facades\Route;

Route::post('/game-turns', [GameTurnController::class, 'index']);
