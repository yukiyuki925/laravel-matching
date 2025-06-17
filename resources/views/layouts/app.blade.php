<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div id="app">
        <div class="h-[720px] w-[400px] bg-white mx-auto border border-[#c0c0c0]">
            <div class="h-[65px] border-b border-[#c0c0c0]">
                <nav class="bg-white">
                    <div class="container mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <!-- Left Side Of Navbar -->
                            <ul class="flex items-center space-x-4">
                                @auth
                                    <li class="relative">
                                        <button id="dropdownButton"
                                            class="text-[#c0c0c0] text-[24px] inline-block relative focus:outline-none">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                        </button>

                                        <div id="dropdownMenu"
                                            class="hidden absolute left-0 mt-2 w-40 bg-white border rounded shadow-xl z-50">
                                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="hidden">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>

                                @endauth
                            </ul>

                            <!-- Center Logo -->
                            <ul class="flex justify-center">
                                <li>
                                    <a href="{{ url('/users') }}" class="block w-[100px] mx-auto p-[10px]">
                                        <img src="https://worldvectorlogo.com/logos/tinder-1.svg" alt="Tinder Logo"
                                            title="Tinder Logo" class="w-[100px]">
                                    </a>
                                </li>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="flex items-center space-x-4">
                                @guest
                                    @if (Route::has('login'))
                                        <li>
                                            <a class="text-gray-600 hover:text-gray-800"
                                                href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li>
                                            <a class="text-gray-600 hover:text-gray-800"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="text-[#c0c0c0] text-[24px] inline-block float-right relative"
                                            href="{{ route('matches.index') }}">
                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            @if (session('flash_message'))
                <div class="bg-green-500 text-white text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
            @endif

            <div class="p-[10px]">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        const button = document.getElementById('dropdownButton');
        const menu = document.getElementById('dropdownMenu');

        document.addEventListener('click', function(e) {
            if (button.contains(e.target)) {
                menu.classList.toggle('hidden');
            } else if (!menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
