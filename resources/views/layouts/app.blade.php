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
    <nav class="bg-red-900 text-white p-4">
        <div class="container mx-auto flex justify-between">
<a href="{{ ('/admin') }}"><img class="w-10 h-15 brightness-90 hover:brightness-110 transition duration-300 ease-in-out" src="{{ url('logo.jpg') }}" alt="JKT48 Logo"></a>
            <ul class="flex items-center space-x-4">
                <li><a href="{{ ('/admin/members') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">Members</a></li>
                <li><a href="{{ ('/admin/setlist') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">Setlist</a></li>
                <li><a href="{{ ('/admin/user') }}" class="text-white hover:text-red-500 transition duration-300 ease-in-out">Users</a></li>
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
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>