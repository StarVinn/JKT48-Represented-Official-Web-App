@include('layouts.user')
@section('content')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Detail Member</h2>
        <div class="grid grid-cols-[repeat(auto-fit,_minmax(150px,_1fr))] gap-4">
            @foreach ($members as $member)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    @php
                        $fotoPath = public_path('storage/foto/' . $member->foto);
                        $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                    @endphp
                    <a href="#">
                        <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}" alt="Tidak Ada Foto" class="rounded-lg mb-2 w-40 h-40 hover:scale-110 transition duration-300">
                    </a>
                    <h3 class="font-bold text-red-500">Nama: {{ $member->name }}</h3>
                    <p class="text-gray-700">Tanggal Lahir: {{ $member->tanggal_lahir }}</p>
                    <p class="text-gray-700">Golongan Darah: {{ $member->golongan_darah }}</p>
                    <p class="text-gray-700">Horoskop: {{ $member->horoskop }}</p>
                    <p class="text-gray-700">Tinggi Badan: {{ $member->tinggi_badan }}</p>
                    <p class="text-gray-700">Nama Panggilan: {{ $member->nama_panggilan }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
// bikin biar ini datanya by member id