@extends('layouts.user')

@section('content')
    <div class="bg-white py-6">
        <div class="container mx-auto px-4 max-w-4xl">
            {{-- Back Button --}}
            <div class="mb-4">
                <a href="{{ route('user.dashboard') }}" 
                   class="text-pink-600 hover:text-pink-800 font-semibold flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Back</span>
                </a>
            </div>
            <div class="w-full bg-pink-100 bg-stripes-pattern p-4 rounded-md">
                <h2 class="text-3xl font-bold text-pink-600 mb-6">Anggota JKT48</h2>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                
                {{-- Foto Member --}}
                <div class="flex justify-center md:justify-start">
                    @php
                        $fotoPath = public_path('storage/foto/' . $member->foto);
                        $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                    @endphp
                    <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}"
                         alt="Foto {{ $member->name }}"
                         class="rounded-lg w-48 h-auto border border-gray-200 shadow hover:scale-105 transition duration-300">
                </div>

                {{-- Info Member --}}
                <div class="md:col-span-2">
                    <table class="w-full text-sm text-left text-gray-700">
                        <tbody>
                            <tr class="border-b">
                                <th class="py-2 font-semibold w-40">Nama</th>
                                <td class="py-2">{{ $member->name }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 font-semibold">Tanggal Lahir</th>
                                <td class="py-2">{{ $member->tanggal_lahir }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 font-semibold">Golongan Darah</th>
                                <td class="py-2">{{ $member->golongan_darah }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 font-semibold">Horoskop</th>
                                <td class="py-2">{{ $member->horoskop }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="py-2 font-semibold">Tinggi Badan</th>
                                <td class="py-2">{{ $member->tinggi_badan }}</td>
                            </tr>
                            <tr>
                                <th class="py-2 font-semibold">Nama Panggilan</th>
                                <td class="py-2">{{ $member->nama_panggilan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Social Media --}}
            <div class="mt-8 text-center">
                <h3 class="text-xl text-pink-600 font-bold mb-2">Twitter</h3>
                <div class="inline-block border border-pink-600 rounded-full px-6 py-2">
                    <a href="https://twitter.com/{{ $member->twitter }}" target="_blank"
                        class= "text-red-600 font-bold">
                        {{ '@' . $member->twitter }}
                    </a>
                </div>
                <br><br>
                <h3 class="text-xl text-pink-600 font-bold mb-2">Instagram</h3>
                <div class="inline-block border border-pink-600 rounded-full px-6 py-2">
                    <a href="https://instagram.com/{{ $member->instagram }}" target="_blank"
                       class="text-red-600 font-bold">{{ '@' . $member->instagram }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
