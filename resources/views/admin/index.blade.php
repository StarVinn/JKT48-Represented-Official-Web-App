@extends('layouts.app')

@section('content')
<h4 class="text-lg font-bold">Welcome.. {{ Auth::user()->name }}</h4> 
<h1 class="text-3xl font-bold mb-4">Dashboard</h1>

{{-- Dashboard Statistics --}}
<div class="grid grid-cols-4 gap-4 mb-6">
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


@endsection