@extends('layouts.app')

@section('content')
<h4 class="text-lg font-bold">Welcome.. {{ Auth::user()->name }}</h4> 
<h1 class="text-3xl font-bold mb-4">Dashboard</h1>

{{-- Dashboard Statistics --}}
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg p-4 shadow">
        <h2 class="text-xl font-bold">{{ $membersCount}}</h2>
        <p>Members</p>
    </div>
    <div class="bg-green-500 text-white rounded-lg p-4 shadow">
        <h2 class="text-xl font-bold">{{ $setlistsCount ?? 0 }}</h2>
        <p>Setlists</p>
    </div>
    <div class="bg-red-500 text-white rounded-lg p-4 shadow">
        <h2 class="text-xl font-bold">{{ $userCount ?? 0 }}</h2>
        <p>Users</p>
    </div>
</div>

 <!-- === BIRTHDAY === -->
 <div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl text-center font-bold mb-6 border-b pb-2">Next Birthday Members JKT48 🎊🎊🎂🎂</h1>

    @if(isset($nextBirthdays) && $nextBirthdays->count() > 0)
      <div class="flex flex-wrap justify-center gap-6 bg-white py-8 px-4">
        @foreach($nextBirthdays as $member)
          <div class="flex flex-col items-center bg-pink-100 p-4 text-center w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-[180px]">
            <img src="{{ asset('storage/foto/' . $member->foto) }}" alt="{{ $member->name }}" class="rounded-lg w-full max-w-[160px] h-auto object-cover mb-2">
            <div class="text-pink-600 font-semibold text-sm">[{{ ucfirst($member->role) }}]</div>
            <div class="text-pink-700 font-bold">{{ $member->name }}</div>
            <div class="text-pink-700">{{ \Carbon\Carbon::parse($member->tanggal_lahir)->translatedFormat('d F Y') }}</div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-center">No upcoming birthdays found.</p>
    @endif
  </div>


@endsection
