<x-mainpage>
    <section class="ec-students-section">
        <div class="container">
            <div class="ec-students-header">
                <div>
                    <span class="ec-section-label">Administration</span>
                    <h1>Students</h1>
                    <p>Manage student records and class information.</p>
                </div>

                <a href="{{ route('crud.create') }}" class="ec-students-add-button">
                    <span>+</span>
                    Add student
                </a>
            </div>

            <div class="ec-students-card">
                <div class="ec-students-card-header">
                    <div>
                        <h2>Student directory</h2>
                        <p>Registered students</p>
                    </div>
                </div>

                <div class="ec-students-table-wrapper">
                    <table class="ec-students-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student name</th>
                                <th>Class</th>
                                <th>Gender</th>
                                <th class="ec-students-actions-heading">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>
                                        <span class="ec-student-id">{{ $student->id }}</span>
                                    </td>
                                    <td>
                                        <div class="ec-student-name-cell">
                                            <div class="ec-student-avatar">
                                                {{ strtoupper(substr($student->nev, 0, 1)) }}
                                            </div>
                                            <span>{{ $student->nev }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="ec-student-class">
                                            {{ $student->osztaly }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="ec-student-gender">
                                            {{ $student->fiu == 1 ? 'Boy' : 'Girl' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="ec-student-actions">
                                            <a href="{{ route('crud.edit', $student) }}" class="ec-student-edit-button">
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('crud.destroy', $student) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this student?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="ec-student-delete-button">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="ec-students-empty">
                                            <div class="ec-students-empty-icon">👥</div>
                                            <h3>No students found</h3>
                                            <p>Add your first student to get started.</p>
                                            <a href="{{ route('crud.create') }}" class="ec-students-add-button">
                                                Add student
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($students->hasPages())
                    <div class="ec-students-pagination">
                        {{ $students->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-mainpage>