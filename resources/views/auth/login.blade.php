<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-b from-red-700 to-pink-300">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <a href="{{ url('/') }}" class="mb-4 inline-block bg-gray-300 text-gray-700 font-bold py-1 px-3 rounded-lg">
            ← Back
        </a>
        <h2 class="text-2xl font-bold text-center text-red-600">Login</h2>
        <p class="text-center text-sm text-gray-500 mb-4">"Dukung dengan hati, nikmati setiap momen, dan biarkan semangat mereka menginspirasi langkahmu."</p>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-red-600 font-semibold">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
