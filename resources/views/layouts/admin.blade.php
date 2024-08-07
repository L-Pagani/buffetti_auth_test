<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>


<body>
    <div id="app">
        <nav class="navbar  navbar-dark bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="text-logo">PM</h1>
                </a>
                <button class="navbar-toggler collapsed d-md-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarsExample04" style="">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/">
                                <i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.posts.index' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.posts.index') }}">
                                <i class="fa-solid fa-list fa-lg fa-fw"></i> Posts List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.categories.index') }}">
                                <i class="fa-solid fa-list fa-lg fa-fw"></i> Categories List
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.posts.create' ? 'bg-secondary' : '' }}"
                                href="{{ route('admin.posts.create') }}">
                                <i class="fa-solid fa-plus fa-lg fa-fw"></i> New Post
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">
                                    <i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.posts.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.posts.index') }}">
                                    <i class="fa-solid fa-list fa-lg fa-fw"></i> Posts List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.categories.index') }}">
                                    <i class="fa-solid fa-list fa-lg fa-fw"></i> Categories List
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.posts.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.posts.create') }}">
                                    <i class="fa-solid fa-plus fa-lg fa-fw"></i> New Post
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
