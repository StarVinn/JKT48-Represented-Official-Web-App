<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .gradient-bg {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="navbar gradient-bg text-red-500 py-4 shadow-lg relative">
    <div class="container mx-auto flex justify-between items-center px-6">
        <a href="{{ route('user.dashboard') }}" class="flex items-center">
            <img src="{{ url('logo.jpg') }}" alt="Logo" class="w-12 h-15 mr-2">
            <span class="text-lg font-bold">JKT48 Fanmade Website</span>
        </a>
        <!-- Hamburger menu button for small screens -->
        <button id="hamburger" class="block md:hidden focus:outline-none" aria-label="Toggle menu">
            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <!-- Navigation links -->
        <ul id="nav-links" class="hidden md:flex gap-4">
            <li><a href="{{ ('members') }}" class="nav-link hover:text-gray-300">Members</a></li>
            <li><a href="{{ ('setlist') }}" class="nav-link hover:text-gray-300">Setlist</a></li>
            <li><a href="{{ ('theater') }}" class="nav-link hover:text-gray-300">Theater</a></li>
            <li><a href="{{ ('live') }}" class="nav-link hover:text-gray-300">Live</a></li>
        </ul>
        <div class="relative md:block hidden">
            <button class="flex items-center text-lg font-bold hover:text-gray-300" id="dropdown-profile">
                {{ Auth::user()->name }}
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="dropdown-menu" class="hidden z-50 w-44 bg-white rounded divide-y divide-gray-100 shadow absolute top-full right-0">
                <ul class="py-1 text-sm text-gray-700">
                    <li>
                        <a href="{{ route('user.profile.show') }}" id="profile-link" class="block py-2 px-4 w-full text-left hover:bg-gray-100">Profile</a>
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="block py-2 px-4 w-full text-left hover:bg-gray-100">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <ul id="mobile-menu" class="md:hidden hidden flex-col gap-4 bg-white text-red-500 p-4 shadow-lg absolute top-full left-0 right-0 z-40 rounded-b">
        <li><a href="{{ ('members') }}" class="nav-link block hover:text-gray-300">Members</a></li>
        <li><a href="{{ ('setlist') }}" class="nav-link block hover:text-gray-300">Setlist</a></li>
        <li><a href="{{ ('theater') }}" class="nav-link block hover:text-gray-300">Theater</a></li>
        <li><a href="{{ ('live') }}" class="nav-link block hover:text-gray-300">Live</a></li>
        @auth
        <li class="border-t border-gray-300 pt-4">
            <button class="flex items-center text-lg font-bold hover:text-gray-300 w-full" id="dropdown-profile-mobile">
                {{ Auth::user()->name }}
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="dropdown-menu-mobile" class="hidden z-50 w-full bg-white rounded divide-y divide-gray-100 shadow mt-2">
                <ul class="py-1 text-sm text-gray-700">
                    <li>
                        <a href="{{ route('user.profile.show') }}" id="profile-link-mobile" class="block py-2 px-4 w-full text-left hover:bg-gray-100">Profile</a>
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="block py-2 px-4 w-full text-left hover:bg-gray-100">Logout</button>
                    </form>
                </ul>
            </div>
        </li>
        @endauth
    </ul>
</nav>

    <div id="content" class="container mx-auto p-4">
        @yield('content')
    </div>

    
    <footer class="bg-gray-800 text-white p-4 text-center bottom-0 left-0 right-0">
        <p>&copy; 2025 JKT48 Fanmade. All rights reserved.</p>
    </footer>

    <script>
        $(document).ready(function() {
            $('.nav-link').click(function(e) {
                e.preventDefault();
                var page = $(this).attr('href');

                $('#content').fadeOut(200, function() {
                    $.get('/partials/' + (page === 'live' ? 'lives' : page), function(data) {
                        $('#content').html(data).fadeIn(200);
                    }).fail(function() {
                        $('#content').html('<p class="text-red-500">Content not found</p>').fadeIn(200);
                    });
                });
            });

            $('#dropdown-profile').click(function(event) {
                event.stopPropagation();
                $('#dropdown-menu').toggleClass('hidden');
            });

            $('#dropdown-profile-mobile').click(function(event) {
                event.stopPropagation();
                $('#dropdown-menu-mobile').toggleClass('hidden');
            });

            $(document).click(function(event) {
                if (!event.target.closest('#dropdown-profile') && !event.target.closest('#dropdown-profile-mobile')) {
                    $('#dropdown-menu').addClass('hidden');
                    $('#dropdown-menu-mobile').addClass('hidden');
                }
            });

            // Hamburger menu toggle
            $('#hamburger').click(function() {
                $('#mobile-menu').toggleClass('hidden');
            });
        });
    </script>
</body>
</html>
