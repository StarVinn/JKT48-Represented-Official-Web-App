<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKT48 Fanmade Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-red-600 text-white p-4 flex items-center">
        <a href="{{ url('/') }}" class="text-white text-xl font-bold mr-4 hover:text-gray-300 border-2 border-white rounded-lg px-1 py-1">
            ←
        </a>
        <h1 class="text-3xl font-bold flex-1 text-left">Explore Us</h1>
    </header>


    <section class="p-6">
        <h2 class="text-2xl font-bold mb-4">About JKT48</h2>
        <p class="mb-4">JKT48 adalah grup idola asal Indonesia yang dibentuk berdasarkan konsep AKB48 dari Jepang, dengan konsep "Idol You Can Meet". Grup ini terkenal dengan pertunjukan teater harian mereka di Jakarta. Member JKT48 dilatih secara ketat dalam bernyanyi, menari, dan berinteraksi dengan penggemar untuk menciptakan pengalaman unik yang tak terlupakan.</p>
    </section>

    <section class="p-6 bg-white">
        <h2 class="text-2xl font-bold mb-4">Theater & Setlist</h2>
        <div class="flex gap-4">
            <img src="/images/theater.jpg" alt="JKT48 Theater" class="w-1/2 rounded-lg shadow-md">
            <div>
                <h3 class="text-lg font-bold">Setlist Populer</h3>
                <ul class="list-disc list-inside">
                    <li>Pajama Drive</li>
                    <li>Renai Kinshi Jourei</li>
                    <li>Dareka no Tame ni</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="p-6">
        <h2 class="text-2xl font-bold mb-4">Active Members</h2>
        <div class="grid grid-cols-[repeat(auto-fit,_minmax(150px,_1fr))] gap-4">
            @foreach ($members as $member)
            <div class="bg-white p-4 rounded-lg shadow-md">
                @php
                    $fotoPath = public_path('storage/foto/' . $member->foto);
                    $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                @endphp
                <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}" alt="Tidak Ada Foto" class="rounded-lg mb-2">
                <h3 class="font-bold">{{ $member->name }}</h3>
            </div>
        @endforeach

        </div>
    </section>

    <section class="p-6 bg-white">
        <h2 class="text-2xl font-bold mb-4">Events & Activities</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            W.I.P
        </div>
    </section>

    <section class="p-6 bg-gradient-to-r from-red-600 to-red-800 text-white rounded-lg shadow-lg mb-6">
        <h2 class="text-3xl font-bold mb-4">Join Us and Be Part of the Dream!</h2>
        <p class="mb-4 text-lg">Jadilah bagian dari dunia JKT48! Rasakan keseruan menjadi fans sejati dan dukung langsung idolamu di teater. Dapatkan pengalaman tak terlupakan dengan berinteraksi langsung dengan member JKT48, ikuti acara eksklusif, dan nikmati momen spesial setiap saat!</p>
        <a href="{{ route('register') }}" class="bg-white text-red-600 font-bold py-2 px-4 rounded hover:bg-gray-200 transition-all">Join Now</a>
    </section>

    <footer class="bg-gray-800 text-white p-4 text-center">
        <p>&copy; 2025 JKT48 Fanmade. All rights reserved.</p>
    </footer>
</body>
</html>