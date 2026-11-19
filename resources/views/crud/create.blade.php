<x-mainpage>
    <section class="ec-student-form-section">
        <div class="container">
            <div class="ec-student-form-header">
                <a href="{{ route('crud.index') }}" class="ec-student-back-link">
                    ← Back to students
                </a>

                <span class="ec-section-label">Administration</span>
                <h1>Add a new student</h1>
                <p>Create a new student record in the system.</p>
            </div>

            <div class="ec-student-form-card">
                <div class="ec-student-form-card-header">
                    <div class="ec-student-form-icon">+</div>
                    <div>
                        <h2>Student information</h2>
                        <p>Enter the student's details below.</p>
                    </div>
                </div>

                <form action="{{ route('crud.store') }}" method="POST" class="ec-student-form">
                    @csrf

                    <div class="ec-form-field">
                        <label for="nev">Full name</label>
                        <input type="text" id="nev" name="nev" placeholder="Enter student's name" value="{{ old('nev') }}">
                        @error('nev')
                            <span class="ec-form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="ec-form-field">
                        <label for="osztaly">Class</label>
                        <input type="text" id="osztaly" name="osztaly" placeholder="Enter class" value="{{ old('osztaly') }}">
                        @error('osztaly')
                            <span class="ec-form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="ec-student-checkbox-field">
                        <input type="hidden" name="fiu" value="0">
                        <input type="checkbox" name="fiu" id="boy" value="1">
                        <label for="boy">Boy</label>
                    </div>

                    <div class="ec-student-form-actions">
                        <a href="{{ route('crud.index') }}" class="ec-student-cancel-button">
                            Cancel
                        </a>
                        <button type="submit" class="ec-student-submit-button">
                            Save student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-mainpage>