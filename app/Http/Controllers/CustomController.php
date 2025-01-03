<?php

namespace App\Http\Controllers;

use Brick\Math\Internal\Calculator;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Inertia\Inertia;

class CustomController extends Controller
{
    public function Calculator(Request $request)
    {
        return Inertia::render('Custom/Calculator');
    }

    public function Tictactoe(Request $request)
    {
        return Inertia::render('Custom/Tictactoe');
    }

    public function Custom(Request $request)
    {
        return Inertia::render('Custom/Custom');
    }
}
