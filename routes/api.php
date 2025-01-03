<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;

Route::get('/api/tic-tac-toe/reset', [GameController::class, 'resetGame']);
Route::post('/api/tic-tac-toe/move', [GameController::class, 'makeMove']);
