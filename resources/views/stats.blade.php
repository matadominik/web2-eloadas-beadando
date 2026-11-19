<x-mainpage>
    <section class="ec-stats-section">
        <div class="container">

            <div class="ec-stats-header">
                <div>
                    <span class="ec-section-label">Academic Analysis</span>
                    <h1>Statistics</h1>
                    <p>Summary and visual analysis of recorded assessments.</p>
                </div>

                <div class="ec-stats-header-icon">
                    📊
                </div>
            </div>

            <div class="ec-stats-card">
                <div class="ec-stats-card-header">
                    <div>
                        <h2>Grade Distribution</h2>
                        <p>Number of occurrences for each grade</p>
                    </div>

                    <span class="ec-stats-chart-badge">
                        📈 Chart
                    </span>
                </div>

                <div class="ec-stats-chart-container">
                    <canvas id="jegyChart"></canvas>
                </div>

                <div class="ec-stats-card-footer">
                    <span>
                        <span class="ec-stats-footer-dot"></span>
                        Data retrieved from the database
                    </span>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = @json($labels);
        const values = @json($values);

        const context = document.getElementById('jegyChart');

        new Chart(context, {
            type: 'bar',

            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Grades',
                    data: values,
                    backgroundColor: [
                        '#3568f5',
                        '#6589ff',
                        '#8da8ff',
                        '#b0c2ff',
                        '#d0dcff'
                    ],
                    borderColor: '#3568f5',
                    borderWidth: 0,
                    borderRadius: 8,
                    maxBarThickness: 65
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    },

                    tooltip: {
                        backgroundColor: '#14213d',
                        padding: 12,
                        cornerRadius: 8,
                        titleFont: {
                            size: 13,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 12
                        }
                    }
                },

                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#71809a',
                            font: {
                                size: 12
                            }
                        }
                    },

                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            color: '#71809a'
                        },
                        grid: {
                            color: '#edf0f5'
                        }
                    }
                }
            }
        });
    </script>
</x-mainpage>