<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    @yield('css')
</head>


<body>
    <nav class="py-2 bg-body-tertiary border-bottom mb-4">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="{!! url('/') !!}"
                        class="nav-link link-body-emphasis px-2">{!! __('Home') !!}</a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <a href="{!! route('login') !!}"
                        class="nav-link link-body-emphasis px-2">{!! __('Login') !!}</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    @yield('js')
</body>

</html>
