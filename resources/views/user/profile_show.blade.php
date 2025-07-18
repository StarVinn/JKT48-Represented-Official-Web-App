@extends('layouts.user')

@section('content')
<div class="relative max-w-3xl mx-auto bg-white p-6 rounded shadow flex flex-col items-center space-y-6">
    
    {{-- ICON DI POJOK KANAN ATAS --}}
    <a href="{{ route('user.profile') }}"
       class="absolute top-4 right-4 bg-white rounded-full p-2 shadow hover:bg-gray-100 z-30"
       title="Edit Profile">
        <img src="{{ asset('edit-logo.png') }}" alt="Edit" class="w-6 h-6 object-contain">
    </a>

    {{-- FOTO PROFIL --}}
    <div class="w-40 h-40 rounded-full overflow-hidden border border-gray-400 flex justify-center items-center">
        @if($user->profile_picture)
            <img src="{{ asset('profile_picture/' . $user->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gray-300 flex items-center justify-center text-gray-600">No Image</div>
        @endif
    </div>

    {{-- NAMA --}}
    <div class="w-full">
        <h3 class="text-lg font-semibold mb-2">Name</h3>
        <div class="border border-gray-400 rounded p-4 bg-transparent text-center">
            <p class="text-lg font-semibold">{{ $user->name }}</p>
        </div>
    </div>
    
    {{-- BIO --}}
    <div class="w-full">
        <h3 class="text-lg font-semibold mb-2">Bio</h3>
        <div class="border border-gray-400 rounded p-4 bg-transparent text-center whitespace-pre-line">
            <p>{{ $user->bio }}</p>
        </div>
    </div>

    {{-- OSHIMEN --}}
    <div class="w-full">
        <h3 class="text-xl font-semibold mb-4 text-center">Oshimen</h3>
        @if($oshimenMembers->isEmpty())
            <p class="text-center text-red-500">Anda Belum Punya Oshimen</p>
        @else
            <div class="grid grid-cols-3 gap-4">
                @foreach($oshimenMembers as $member)
                    @php
                        $fotoPath = public_path('storage/foto/' . $member->foto);
                        $timestamp = file_exists($fotoPath) ? filemtime($fotoPath) : time();
                    @endphp
                    <div class="bg-white p-3 rounded-lg shadow-md flex flex-col items-center">
                        @if($member->foto)
                            <img src="{{ asset('storage/foto/' . $member->foto) }}?v={{ $timestamp }}" alt="{{ $member->name }}" class="rounded-lg w-25 h-30 mb-2 hover:scale-110 transition duration-300 object-cover">
                        @else
                            <div class="w-24 h-24 bg-gray-300 rounded mb-2 flex items-center justify-center text-gray-600">No Image</div>
                        @endif
                        <a href="{{ route('user.detailmember', ['id' => $member->id]) }}">
                            <h3 class="font-bold text-red-500 hover:text-red-700 hover:underline transition duration-300 text-center">{{ $member->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
