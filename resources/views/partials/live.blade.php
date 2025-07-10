<section class="p-6">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Member JKT48 yang Sedang Live di SHOWROOM</h1>

        @if ($error)
            <div class="text-red-500 mb-4">{{ $error }}</div>
        @endif

        @forelse ($lives as $live)
            <div class="mb-6 p-4 border rounded shadow">
                <h2 class="text-xl font-semibold mb-2">{{ $live['main_name'] }}</h2>
                <img src="{{ $live['image'] }}" alt="{{ $live['main_name'] }}" class="w-full max-w-sm mb-2">
                <a href="https://www.showroom-live.com/{{ $live['room_url_key'] }}" target="_blank"
                class="inline-block text-blue-600 hover:underline">
                Tonton Live
                </a>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada member JKT48 yang sedang live saat ini.</p>
        @endforelse
    </div>
</section>