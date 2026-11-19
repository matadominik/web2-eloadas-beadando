<?php

namespace App\Services;

use InvalidArgumentException;

class CalculatorService
{
    public function calculate(float $firstNumber, float $secondNumber, string $operation): float
    {
        return match ($operation) {
            'add' => $firstNumber + $secondNumber,
            'subtract' => $firstNumber - $secondNumber,
            'multiply' => $firstNumber * $secondNumber,
            'divide' => $secondNumber === 0.0
                ? throw new InvalidArgumentException('Division by zero is not allowed.')
                : $firstNumber / $secondNumber,
            default => throw new InvalidArgumentException('Unknown operation.'),
        };
    }
}
