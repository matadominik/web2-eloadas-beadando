<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="E-Crayon - modern electronic student information system">
    <meta name="author" content="E-Crayon">
    <meta name="theme-color" content="#14213d">

    <title>{{ config('app.name', 'E-Crayon') }}</title>

    <link rel="stylesheet" href="{{ asset('joson/css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700|Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('joson/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('joson/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('joson/css/ecrayon.css') }}" rel="stylesheet">
</head>

<body>
    <div class="ec-page">
        @include('header')

        <main class="ec-main">
            {{ $slot }}
        </main>

        <footer class="ec-footer">
            <div class="container">
                <div class="ec-footer-content">
                    <div class="ec-footer-brand">
                        <a href="{{ url('/home') }}" class="ec-logo ec-logo-footer">
                            <span class="ec-logo-icon">E</span>
                            <span>E-Crayon</span>
                        </a>
                        <p>
                            Academic information made simple,
                            transparent, and accessible in one place.
                        </p>
                    </div>

                    <div class="ec-footer-links">
                        <h4>Quick Links</h4>
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/gradebook') }}">Gradebook</a>
                        <a href="{{ url('/stats') }}">Statistics</a>
                        <a href="{{ url('/contact') }}">Contact</a>
                    </div>

                    <div class="ec-footer-info">
                        <h4>Project authors</h4>
                        <p>Mata László Dominik — B223VA</p>
                        <p>Fazekas Bence — ZK6FMO</p>
                        <p>Web Programming II Project</p>
                    </div>
                </div>

                <div class="ec-footer-bottom">
                    <span>&copy; {{ date('Y') }} E-Crayon</span>
                    <span>Web Programming II</span>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>