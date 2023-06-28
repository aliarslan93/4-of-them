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
                    <a href="{!! route('home') !!}"
                        class="nav-link link-body-emphasis px-2">{!! __('Home') !!}</a>
                </li>
                @if (session()->has('user'))
                    <li class="nav-item">
                        <a href="{!! route('author.list') !!}"
                            class="nav-link link-body-emphasis px-2">{!! __('Authors') !!}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link link-body-emphasis px-2">{!! __('Add Book') !!}</a>
                    </li>
                @endif
            </ul>
            <ul class="nav">
                @if (session()->has('user'))
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis px-2">
                        {!! session()->get('user')->first_name !!}
                        {!! session()->get('user')->last_name !!}
                    </a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link link-body-emphasis px-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            {!! __('Logout') !!}
                        </a>
                        <form action="{!! route('logout') !!}" method="POST">
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-body-emphasis px-2" href="{{ route('login') }}">
                            {!! __('Login') !!}
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    @yield('js')
</body>

</html>
