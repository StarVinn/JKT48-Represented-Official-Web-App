<section class="p-6">
    <div class="max-w-6xl mx-auto">
        <h3 class="font-bold text-black mb-4 text-2xl">Setlist Performance</h3>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach ($setlists as $setlist)
                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    @php
                        $imagePath = public_path('storage/foto/' . $setlist->image);
                        $timestamp = file_exists($imagePath) ? filemtime($imagePath) : time();
                    @endphp
                    <a href="{{ route('user.setlists.show', $setlist->id) }}">
                        <img src="{{ asset('storage/foto/' . $setlist->image) }}?v={{ $timestamp }}"
                             alt="{{ $setlist->title }}"
                             class="mx-auto w-24 h-24 rounded-lg object-cover mb-3 hover:scale-110 transition duration-300">
                    </a>
                    <a href="{{ route('user.setlists.show', $setlist->id) }}">
                        <h3 class="font-bold text-red-500 hover:text-red-700 leading-tight text-sm">
                            {{ $setlist->title }}<br>
                            <span class="text-red-500">{{ $setlist->artist }}</span>
                        </h3>
                    </a>
                    <p class="text-xs text-gray-500 mt-1">({{ $setlist->production_year }})</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
