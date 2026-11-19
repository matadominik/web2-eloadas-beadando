<x-mainpage>
    <section class="ec-students-section">
        <div class="container">
            <div class="ec-students-header">
                <div>
                    <span class="ec-section-label">Administration</span>
                    <h1>Students</h1>
                    <p>Manage student records and class information.</p>
                </div>
            </div>

            <div class="ec-students-card">
                <div class="ec-students-card-header">
                    <div>
                        <h2>Student directory</h2>
                        <p>React-powered management with Axios requests</p>
                    </div>
                </div>

                <div
                    id="student-crud-root"
                    data-students="{{ json_encode($students->items()) }}"
                    data-csrf="{{ csrf_token() }}"
                ></div>

                @if ($students->hasPages())
                    <div class="ec-students-pagination">
                        {{ $students->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    @vite('resources/js/student-crud-entry.tsx')
</x-mainpage>
