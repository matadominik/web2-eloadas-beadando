<?php

namespace App\Http\Controllers;

use App\Services\CalculatorService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class TestMenuController extends Controller
{
    public function index()
    {
        return view('test-menu');
    }

    public function calculate(Request $request, CalculatorService $calculator)
    {
        $validated = $request->validate([
            'first_number' => 'required|numeric|min:-1000000|max:1000000',
            'second_number' => 'required|numeric|min:-1000000|max:1000000',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ]);

        try {
            $result = $calculator->calculate(
                (float) $validated['first_number'],
                (float) $validated['second_number'],
                $validated['operation']
            );
        } catch (InvalidArgumentException $exception) {
            return back()->withInput()->withErrors(['second_number' => $exception->getMessage()]);
        }

        return view('test-menu', [
            'result' => $result,
            'firstNumber' => $validated['first_number'],
            'secondNumber' => $validated['second_number'],
            'operation' => $validated['operation'],
        ]);
    }
}
