<section class="p-6">
    <h3 class="font-bold text-black mb-4 text-2xl">Active Member</h3>
    <div class="grid grid-cols-1 gap-4">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h3 class="font-bold text-red-500 text-2xl mb-4">Anggota</h3>
            <div class="grid grid-cols-[repeat(auto-fit,_minmax(130px,_1fr))] gap-4">
                @foreach ($members as $member)
                    @if ($member->role == 'anggota')
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            @php
                                $fotoPath = public_path('storage/foto/' . $member->foto);
                                $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                            @endphp
                            <a href="#">
                                <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}" alt="Tidak Ada Foto" class="rounded-lg w-25 h-30 mb-2 hover:scale-110 transition duration-300">
                            </a>
                            <h3 class="font-bold text-red-500">{{ $member->name }}</h3>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md mt-8">
            <h3 class="font-bold text-red-500 mb-4 text-2xl">Trainee</h3>
            <div class="grid grid-cols-[repeat(auto-fit,_minmax(130px,_1fr))] gap-4">
                @foreach ($members as $member)
                    @if ($member->role == "trainee")
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            @php
                                $fotoPath = public_path('storage/foto/' . $member->foto);
                                $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                            @endphp
                            <a href="#">
                                <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}" alt="Tidak Ada Foto" class="rounded-lg w-25 h-30 mb-2 hover:scale-110 transition duration-300">
                            </a>
                            <h3 class="font-bold text-red-500">{{ $member->name }}</h3>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>