<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AvansTour | @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/436d2e61dc.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
            integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
            crossorigin=""></script>

    <script src="{{ asset('js/form.js') }}" defer></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('img/logo_avans.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item custom-link">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item custom-link">
                        <a class="nav-link {{ request()->is('speurtochten*') ? 'active' : '' }}" href="/speurtochten">Speurtochten</a>
                    </li>
                    <li class="nav-item custom-link">
                        <a class="nav-link" href="#">Scoreboard</a>
                    </li>
                    <li class="nav-item custom-link">
                        <a class="nav-link" href="#">Over ons</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="https://www.facebook.com/avans/" target="_blank"><i id="facebook" class="fa-brands fa-facebook footer-icon"></i></a>
                    <a href="https://twitter.com/avanshogeschool" target="_blank"><i id="twitter" class="fa-brands fa-twitter footer-icon"></i></a>
                    <a href="mailto:mail.avans.nl/" target="_blank"><i id="mail" class="fa-solid fa-envelope footer-icon"></i></a>
                </div>
                <div class="col-12 text-center">
                    <p id="footer-copyright">&copyAvansTour</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
