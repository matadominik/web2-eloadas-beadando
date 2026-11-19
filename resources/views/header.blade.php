<header class="ec-header">
    <div class="container">
        <div class="ec-header-inner">

            <a href="{{ url('/home') }}" class="ec-logo">
                <span class="ec-logo-icon">E</span>
                <span class="ec-logo-text">E-Crayon</span>
            </a>

            <button class="ec-menu-toggle" type="button" aria-label="Open navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="ec-navigation">
                <a href="{{ url('/home') }}"
                   class="{{ request()->is('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ url('/gradebook') }}"
                   class="{{ request()->is('gradebook') ? 'active' : '' }}">
                    Gradebook
                </a>

                <a href="{{ url('/stats') }}"
                   class="{{ request()->is('stats') ? 'active' : '' }}">
                    Statistics
                </a>

                <a href="{{ url('/contact') }}"
                   class="{{ request()->is('contact') ? 'active' : '' }}">
                    Contact
                </a>

                @auth
                    <a href="{{ url('/messages') }}"
                       class="{{ request()->is('messages') ? 'active' : '' }}">
                        Messages
                    </a>

                    @if (Auth::user()->role == 1)
                        <a href="{{ url('/crud') }}"
                           class="{{ request()->is('crud*') ? 'active' : '' }}">
                            Students
                        </a>
                    @endif
                @endauth
            </nav>

            <div class="ec-header-actions">
                @auth
                    <div class="ec-user-info">
                        <span class="ec-user-icon">👤</span>
                        <span>{{ Auth::user()->name ?? 'User' }}</span>
                    </div>

                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" class="ec-button ec-button-outline">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ url('/login') }}" class="ec-button ec-button-outline">
                        Login
                    </a>

                    <a href="{{ url('/register') }}" class="ec-button ec-button-primary">
                        Register
                    </a>
                @endauth
            </div>

        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.querySelector('.ec-menu-toggle');
        const navigation = document.querySelector('.ec-navigation');

        if (menuButton && navigation) {
            menuButton.addEventListener('click', function () {
                navigation.classList.toggle('ec-navigation-open');
                menuButton.classList.toggle('ec-menu-open');
            });
        }
    });
</script>