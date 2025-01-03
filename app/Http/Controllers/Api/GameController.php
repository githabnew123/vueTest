<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    private $board;
    private $winner;
    private $currentPlayer;

    public function __construct()
    {
        $this->resetGame();
    }

    public function resetGame()
    {
        return response()->json([
            'winner' => "Me",
        ]);
    }

    public function makeMove(Request $request)
    {
        $index = $request->input('index');
        $this->board[$index] = $this->currentPlayer;

        // Check for a winner (logic omitted for brevity)
        $this->winner = null;

        return response()->json([
            'board' => $this->board,
            'currentPlayer' => $this->currentPlayer,
            'winner' => $this->winner,
        ]);
    }
}
