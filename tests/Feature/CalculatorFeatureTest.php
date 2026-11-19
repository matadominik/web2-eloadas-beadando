<?php

use App\Services\CalculatorService;

test('test menu page is available', function () {
    $this->get('/test-menu')->assertOk()->assertSee('Calculation Lab');
});

test('addition form returns the result', function () {
    $this->post('/test-menu/calculate', [
        'first_number' => 8,
        'second_number' => 4,
        'operation' => 'add',
    ])->assertOk()->assertSee('12');
});

test('subtraction form returns the result', function () {
    $this->post('/test-menu/calculate', [
        'first_number' => 8,
        'second_number' => 4,
        'operation' => 'subtract',
    ])->assertOk()->assertSee('4');
});

test('multiplication form returns the result', function () {
    $this->post('/test-menu/calculate', [
        'first_number' => 8,
        'second_number' => 4,
        'operation' => 'multiply',
    ])->assertOk()->assertSee('32');
});

test('division form returns the result', function () {
    $this->post('/test-menu/calculate', [
        'first_number' => 8,
        'second_number' => 4,
        'operation' => 'divide',
    ])->assertOk()->assertSee('2');
});

test('calculator validates missing inputs', function () {
    $this->post('/test-menu/calculate', [])
        ->assertSessionHasErrors(['first_number', 'second_number', 'operation']);
});

test('calculator validates the operation', function () {
    $this->post('/test-menu/calculate', [
        'first_number' => 8,
        'second_number' => 4,
        'operation' => 'unknown',
    ])->assertSessionHasErrors('operation');
});

test('division by zero returns a validation error', function () {
    $this->post('/test-menu/calculate', [
        'first_number' => 8,
        'second_number' => 0,
        'operation' => 'divide',
    ])->assertOk()->assertSee('Division by zero is not allowed.');
});
