<x-mainpage>
    <section class="ec-gradebook-section">
        <div class="container">

            <div class="ec-gradebook-header">
                <div>
                    <span class="ec-section-label">Student Information System</span>
                    <h1>Gradebook</h1>
                    <p>Review your academic results in one place.</p>
                </div>

                <div class="ec-gradebook-header-icon">
                    📚
                </div>
            </div>

            <div class="ec-gradebook-card">
                <div class="ec-gradebook-card-header">
                    <div>
                        <h2>Grade Overview</h2>
                        <p>List of all recorded assessments</p>
                    </div>

                    <div class="ec-gradebook-count">
                        {{ $grades->total() }} assessments
                    </div>
                </div>

                <div class="ec-gradebook-table-wrapper">
                    <table class="ec-gradebook-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Student</th>
                                <th>Subject</th>
                                <th>Assessment Type</th>
                                <th>Grade</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($grades as $grade)
                                <tr>
                                    <td>
                                        <span class="ec-gradebook-date">
                                            {{ $grade->datum }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="ec-gradebook-student">
                                            {{ $grade->diak->nev }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="ec-gradebook-subject">
                                            {{ $grade->targy->nev }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="ec-gradebook-type">
                                            {{ $grade->tipus }}
                                        </span>
                                    </td>

                                    <td>
                                        @php
                                            $gradeValue = (int) $grade->ertek;
                                        @endphp

                                        <span class="ec-grade-badge
                                            {{ $gradeValue >= 4 ? 'ec-grade-good' : ($gradeValue == 3 ? 'ec-grade-average' : 'ec-grade-low') }}">
                                            {{ $grade->ertek }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="ec-gradebook-empty">
                                            <div class="ec-gradebook-empty-icon">📭</div>
                                            <h3>No grades available</h3>
                                            <p>There are currently no assessments available in the database.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($grades->hasPages())
                    <div class="ec-gradebook-pagination">
                        {{ $grades->links() }}
                    </div>
                @endif
            </div>

        </div>
    </section>
</x-mainpage>