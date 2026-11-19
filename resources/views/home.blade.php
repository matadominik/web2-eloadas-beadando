<x-mainpage>
    <section class="ec-hero">
        <div class="container">
            <div class="ec-hero-content">
                <div class="ec-hero-text">
                    <span class="ec-eyebrow">
                        <span class="ec-eyebrow-dot"></span>
                        Electronic Student Information System
                    </span>

                    <h1>
                        All your academic
                        <span>information in one place.</span>
                    </h1>

                    <p>
                        E-Crayon makes it easy to review your grades,
                        track your academic performance and contact
                        the administrators of the platform.
                    </p>

                    <div class="ec-hero-actions">
                        <a href="{{ url('/gradebook') }}" class="ec-button ec-button-primary ec-button-large">
                            View My Grades
                            <span>→</span>
                        </a>

                        <a href="{{ url('/stats') }}" class="ec-button ec-button-light ec-button-large">
                            Statistics
                        </a>
                    </div>

                    <div class="ec-hero-note">
                        <span class="ec-check-icon">✓</span>
                        Transparent · Simple · Modern
                    </div>
                </div>

                <div class="ec-hero-visual">
                    <div class="ec-hero-card ec-hero-card-main">
                        <div class="ec-card-header">
                            <div>
                                <span class="ec-card-label">Academic Overview</span>
                                <h3>Welcome to E-Crayon!</h3>
                            </div>

                            <span class="ec-card-status">● Active</span>
                        </div>

                        <div class="ec-card-stat">
                            <div class="ec-stat-icon ec-stat-blue">📚</div>
                            <div>
                                <strong>Grades</strong>
                                <span>Academic results</span>
                            </div>
                            <span class="ec-stat-arrow">→</span>
                        </div>

                        <div class="ec-card-stat">
                            <div class="ec-stat-icon ec-stat-purple">📊</div>
                            <div>
                                <strong>Statistics</strong>
                                <span>Performance overview</span>
                            </div>
                            <span class="ec-stat-arrow">→</span>
                        </div>

                        <div class="ec-card-stat">
                            <div class="ec-stat-icon ec-stat-green">✉</div>
                            <div>
                                <strong>Contact</strong>
                                <span>Send us a message</span>
                            </div>
                            <span class="ec-stat-arrow">→</span>
                        </div>

                        <div class="ec-card-bottom">
                            <span>Academic Information</span>
                            <span class="ec-card-bottom-badge">E-Crayon</span>
                        </div>
                    </div>

                    <div class="ec-hero-decoration ec-decoration-one"></div>
                    <div class="ec-hero-decoration ec-decoration-two"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="ec-features-section">
        <div class="container">
            <div class="ec-section-heading">
                <span class="ec-section-label">Features</span>
                <h2>Everything you need,<br><span>in one place.</span></h2>
                <p>
                    The main features of the application help you
                    access your academic information quickly and easily.
                </p>
            </div>

            <div class="ec-feature-grid">
                <a href="{{ url('/gradebook') }}" class="ec-feature-card">
                    <div class="ec-feature-icon ec-feature-blue">📖</div>
                    <h3>Grade Overview</h3>
                    <p>
                        Your academic results and grades are displayed
                        in an easy-to-read list.
                    </p>
                    <span class="ec-feature-link">View Grades →</span>
                </a>

                <a href="{{ url('/stats') }}" class="ec-feature-card">
                    <div class="ec-feature-icon ec-feature-purple">📈</div>
                    <h3>Statistics</h3>
                    <p>
                        Track the development of your academic results
                        using visual charts.
                    </p>
                    <span class="ec-feature-link">View Statistics →</span>
                </a>

                <a href="{{ url('/contact') }}" class="ec-feature-card">
                    <div class="ec-feature-icon ec-feature-green">✉</div>
                    <h3>Contact</h3>
                    <p>
                        Send a message to the administrators
                        if you have a question or feedback.
                    </p>
                    <span class="ec-feature-link">Contact Us →</span>
                </a>
            </div>
        </div>
    </section>

    <section class="ec-cta-section">
        <div class="container">
            <div class="ec-cta-content">
                <div>
                    <span class="ec-section-label ec-section-label-light">
                        E-Crayon
                    </span>

                    <h2>
                        Start exploring
                        <span>your academic information!</span>
                    </h2>

                    <p>
                        Sign in to the application and review
                        the academic information available to you.
                    </p>
                </div>

                <div class="ec-cta-actions">
                    @auth
                        <a href="{{ url('/gradebook') }}" class="ec-button ec-button-white">
                            View Grades →
                        </a>
                    @else
                        <a href="{{ url('/register') }}" class="ec-button ec-button-white">
                            Register →
                        </a>

                        <a href="{{ url('/login') }}" class="ec-cta-login">
                            Already have an account? Sign in
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</x-mainpage>