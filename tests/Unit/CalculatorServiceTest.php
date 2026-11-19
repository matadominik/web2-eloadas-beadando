<?php

use App\Services\CalculatorService;

beforeEach(function () {
    $this->calculator = new CalculatorService();
});

test('calculator adds two numbers', function () {
    expect($this->calculator->calculate(12, 8, 'add'))->toBe(20.0);
});

test('calculator subtracts two numbers', function () {
    expect($this->calculator->calculate(12, 8, 'subtract'))->toBe(4.0);
});

test('calculator multiplies two numbers', function () {
    expect($this->calculator->calculate(12, 8, 'multiply'))->toBe(96.0);
});

test('calculator divides two numbers', function () {
    expect($this->calculator->calculate(16, 4, 'divide'))->toBe(4.0);
});

test('calculator supports decimal values', function () {
    expect($this->calculator->calculate(2.5, 1.2, 'add'))->toBe(3.7);
});

test('calculator rejects division by zero', function () {
    expect(fn () => $this->calculator->calculate(10, 0, 'divide'))
        ->toThrow(\InvalidArgumentException::class, 'Division by zero is not allowed.');
});

test('calculator rejects unknown operations', function () {
    expect(fn () => $this->calculator->calculate(10, 2, 'power'))
        ->toThrow(\InvalidArgumentException::class, 'Unknown operation.');
});
