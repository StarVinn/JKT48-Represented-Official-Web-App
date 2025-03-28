<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradientAnimation {
            0% { background: #ff2327; }
            50% { background: #8b0000; }
            100% { background: #fb3034; }
        }

        .gradient-bg {
            animation: gradientAnimation 10s infinite alternate;
        }
    </style>
</head>
<body>
    <nav class="navbar gradient-bg text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="flex items-center">
                <img src="{{ url('logo.jpg') }}" alt="Logo" class="w-8 h-11 mr-2">
                <span class="text-lg font-bold">JKT48 Fanmade Website</span>
            </a>
            <div class="relative">
                <button id="navbarDropdown" class="flex items-center text-lg font-bold focus:outline-none">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    <ul class="py-1 text-gray-700">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Profil</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Pengaturan</a></li>
                        <li><hr class="my-2"></li>
                        <li><form action="{{ route('logout') }}" method="POST" class="ml-4">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <script>
        document.getElementById('navbarDropdown').addEventListener('click', function () {
            document.getElementById('dropdownMenu').classList.toggle('hidden');
        });
        document.addEventListener('click', function (event) {
            if (!event.target.closest('#navbarDropdown')) {
                document.getElementById('dropdownMenu').classList.add('hidden');
            }
        });
    </script>
</body>
</html>
