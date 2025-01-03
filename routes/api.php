<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\SelfPHPUnitTest;

Route::get('/api/tic-tac-toe/reset', [GameController::class, 'resetGame']);
Route::post('/api/tic-tac-toe/move', [GameController::class, 'makeMove']);
Route::resource('selftest',SelfPHPUnitTest::class);
