<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-b from-red-700 to-pink-300">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <a href="{{ url('/') }}" class="mb-4 inline-block bg-gray-300 text-gray-700 font-bold py-1 px-3 rounded-lg">
            ← Back
        </a>
        <h2 class="text-2xl font-bold text-center text-red-600">Register</h2>
        <p class="text-center text-sm text-gray-500 mb-4">"Gabung bersama kami dan jadilah bagian dari komunitas yang penuh semangat!"</p>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400" />
            </div>

            <button type="submit" id="registerButton" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                Register
            </button>
        </form>
        @if ($errors->any())
            <div class="text-red-500 mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <p class="text-center text-sm text-gray-500 mt-4">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-red-600 font-semibold">Login di sini</a>
        </p>
    </div>
<script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        var registerButton = document.getElementById('registerButton');
        registerButton.disabled = true;
        registerButton.textContent = 'Register in...';
    });
</script>
</body>
</html>
