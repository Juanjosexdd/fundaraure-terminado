<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="img/favicon1.png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
        <style>
        .funda{
            color: #059edb;
        }
        .araure{
            color: #ed3a91;
        }
        .footer {
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 40px;
        }
    </style>

</head>
<body>
    <div class="app d-flex flex-column h-screen justify-content-between">
        <header>
            <nav class="navbar navbar-light navbar-expand-md bg-white shadow-sm mb-3">

                <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="navbar-brand" href="">
                                <p class="text-center text-uppercase"><span class="funda">fund</span><span class="araure">araure</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('login')}}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mision-tab" data-toggle="tab" href="#mision" role="tab" aria-controls="mision" aria-selected="false">Misión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="vision-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="false">Visión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contactanos</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="shadow footer bg-white text-center py-3 text-black-50">
            {{ config('app.name' )}} | Copyright @
        </footer>
    </div>
</body>
</html>

