<section class="p-6">
    <h3 class="bg-pink-500 text-white font-bold mb-4 text-2xl p-2 rounded">Active Member</h3>
    
    <div class="grid grid-cols-1 gap-4">

        {{-- Anggota --}}
        <div class="bg-white p-4 rounded-lg">
            <h3 class="font-bold text-red-500 text-2xl mb-4">Anggota</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-4">
                @foreach ($members as $member)
                    @if ($member->role == 'anggota')
                        @php
                            $fotoPath = public_path('storage/foto/' . $member->foto);
                            $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                        @endphp
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <a href="{{ route('user.detailmember', ['id' => $member->id]) }}">
                                <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}"
                                     alt="Tidak Ada Foto"
                                     class="rounded-lg w-full aspect-[3/4] object-cover mb-2 hover:scale-110 transition duration-300">
                            </a>
                            <a href="{{ route('user.detailmember', ['id' => $member->id]) }}">
                                <h3 class="font-bold text-red-500 hover:text-red-700 hover:underline transition duration-300 text-center">
                                    {{ $member->name }}
                                </h3>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Trainee --}}
        <div class="bg-white p-4 rounded-lg mt-8">
            <h3 class="font-bold text-red-500 text-2xl mb-4">Trainee</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-4">
                @foreach ($members as $member)
                    @if ($member->role == 'trainee')
                        @php
                            $fotoPath = public_path('storage/foto/' . $member->foto);
                            $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                        @endphp
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <a href="{{ route('user.detailmember', ['id' => $member->id]) }}">
                                <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}"
                                     alt="Tidak Ada Foto"
                                     class="rounded-lg w-full aspect-[3/4] object-cover mb-2 hover:scale-110 transition duration-300">
                            </a>
                            <a href="{{ route('user.detailmember', ['id' => $member->id]) }}">
                                <h3 class="font-bold text-red-500 hover:text-red-700 hover:underline transition duration-300 text-center">
                                    {{ $member->name }}
                                </h3>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</section>
