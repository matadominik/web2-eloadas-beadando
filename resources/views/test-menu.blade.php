<x-mainpage>
    <section class="ec-test-menu-section">
        <div class="container">
            <div class="ec-test-menu-header">
                <span class="ec-section-label">Practice tools</span>
                <h1>Calculation Lab</h1>
                <p>Practice the four basic mathematical operations with instant results.</p>
            </div>

            <div class="ec-calculator-card">
                <div class="ec-calculator-card-top">
                    <div class="ec-calculator-icon">∑</div>
                    <div>
                        <h2>Four-operation calculator</h2>
                        <p>Enter two numbers and choose an operation.</p>
                    </div>
                </div>

                @if (isset($result))
                    <div class="ec-calculator-result" role="status">
                        <span>Result</span>
                        <strong>{{ $result }}</strong>
                        <div class="ec-calculator-equation">
                            {{ $firstNumber }}
                            @switch($operation)
                                @case('add') + @break
                                @case('subtract') − @break
                                @case('multiply') × @break
                                @case('divide') ÷ @break
                            @endswitch
                            {{ $secondNumber }} = {{ $result }}
                        </div>
                    </div>
                @endif

                <form class="ec-calculator-form" action="{{ url('/test-menu/calculate') }}" method="POST">
                    @csrf
                    <div class="ec-calculator-fields">
                        <label>
                            First number
                            <input type="number" name="first_number" step="any" value="{{ old('first_number', $firstNumber ?? '') }}" required>
                            @error('first_number') <span class="ec-calculator-error">{{ $message }}</span> @enderror
                        </label>
                        <label>
                            Operation
                            <select name="operation" required>
                                <option value="add" @selected(old('operation', $operation ?? 'add') === 'add')>Addition (+)</option>
                                <option value="subtract" @selected(old('operation', $operation ?? '') === 'subtract')>Subtraction (−)</option>
                                <option value="multiply" @selected(old('operation', $operation ?? '') === 'multiply')>Multiplication (×)</option>
                                <option value="divide" @selected(old('operation', $operation ?? '') === 'divide')>Division (÷)</option>
                            </select>
                            @error('operation') <span class="ec-calculator-error">{{ $message }}</span> @enderror
                        </label>
                        <label>
                            Second number
                            <input type="number" name="second_number" step="any" value="{{ old('second_number', $secondNumber ?? '') }}" required>
                            @error('second_number') <span class="ec-calculator-error">{{ $message }}</span> @enderror
                        </label>
                    </div>
                    <div class="ec-calculator-actions">
                        <button class="ec-button ec-button-primary ec-button-large" type="submit">Calculate result <span>→</span></button>
                        <a class="ec-button ec-button-light ec-button-large" href="{{ url('/test-menu') }}">Reset</a>
                    </div>
                </form>
            </div>

            <div class="ec-calculator-info-grid">
                <article><span>+</span><h3>Addition</h3><p>Add two values together.</p></article>
                <article><span>−</span><h3>Subtraction</h3><p>Calculate the difference between two values.</p></article>
                <article><span>×</span><h3>Multiplication</h3><p>Multiply the two input values.</p></article>
                <article><span>÷</span><h3>Division</h3><p>Divide the first value by the second.</p></article>
            </div>
        </div>
    </section>
</x-mainpage>
