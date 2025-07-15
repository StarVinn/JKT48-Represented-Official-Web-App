<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member App</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-red-900 text-white p-4 relative">
        <div class="container mx-auto flex justify-between items-center">
        <a href="{{ ('/admin') }}" class="flex items-center">
            <img class="w-12 h-15 mr-2 brightness-90 hover:brightness-110 transition duration-300 ease-in-out" src="{{ url('logo.jpg') }}" alt="JKT48 Logo">
            <span class="text-lg font-bold">Admin Dashboard</span>
        </a>
        <!-- Hamburger menu button for small screens -->
        <button id="hamburger" class="block md:hidden focus:outline-none" aria-label="Toggle menu">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <!-- Navigation links -->
        <ul id="nav-links" class="hidden md:flex items-center space-x-4">
            <li><a href="{{ ('/admin/news') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">News</a></li>
            <li><a href="{{ ('/admin/members') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">Members</a></li>
            <li><a href="{{ ('/admin/setlist') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">Setlist</a></li>
            <li><a href="{{ ('/admin/user') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">Users</a></li>
        </ul>
        <div class="hidden md:flex items-center">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 transition duration-300 ease-in-out text-white font-bold py-2 px-4 rounded ">Logout</button>
                </form>
            @else
                <a class="text-white hover:text-gray-300 ml-4" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
        </div>
        <!-- Mobile menu -->
        <ul id="mobile-menu" class="md:hidden hidden flex-col gap-4 bg-red-900 p-4 absolute top-full left-0 right-0 z-40 rounded-b">
            <li><a href="{{ ('/admin/news') }}" class="block hover:text-red-500">News</a></li>
            <li><a href="{{ ('/admin/members') }}" class="block hover:text-red-500">Members</a></li>
            <li><a href="{{ ('/admin/setlist') }}" class="block hover:text-red-500">Setlist</a></li>
            <li><a href="{{ ('/admin/user') }}" class="block hover:text-red-500">Users</a></li>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-700 transition duration-300 ease-in-out text-white font-bold py-2 px-4 rounded ">Logout</button>
                </form>
            @else
                <a class="block text-white hover:text-gray-300 mt-4" href="{{ route('login') }}">Login</a>
            @endauth
        </ul>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const hamburger = document.getElementById('hamburger');
            const mobileMenu = document.getElementById('mobile-menu');

            hamburger.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
